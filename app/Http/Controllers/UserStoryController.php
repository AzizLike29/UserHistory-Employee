<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\UserStory;
use Illuminate\Http\Request;

class UserStoryController extends Controller
{
    public function index()
    {
        $userStories = UserStory::select('first_name', 'last_name', 'position', 'email', 'phone', 'city', 'province', 'id')->get();
        return view('admin.UserStoryView', compact('userStories'));
    }

    public function create()
    {
        return view('admin.create.PageCreateUserHistory');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $userStories = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:user_stories,email',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'street_address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'ktp_number' => 'required|string|max:20|unique:user_stories,ktp_number',
            'position' => 'required|string|max:100',
            'bank_account_name' => 'required|string|max:150',
            'bank_account_number' => 'required|string|max:50',
            'scan_ktp_url_drive' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Upload file dan simpan URL-nya
        $userStories['scan_ktp_url_drive'] = $this->uploadDrive($request->file('scan_ktp_url_drive'));

        UserStory::create($userStories);

        return redirect()->route('userstory.index')->with('success', 'User story created successfully.');
    }

    private function uploadDrive($file)
    {
        try {
            $client = new \Google\Client();
            $client->setAuthConfig(storage_path('app/google/ktp-karyawan.json'));
            $client->addScope(\Google\Service\Drive::DRIVE);
            $drive = new \Google\Service\Drive($client);

            $googleFile = new \Google\Service\Drive\DriveFile([
                'name' => $file->getClientOriginalName(),
                'parents' => ['1bGWbmHCwgdrYwPzpwF8qd4HW2CaAvTMP'],
            ]);

            $result = $drive->files->create($googleFile, [
                'data' => file_get_contents($file),
                'mimeType' => $file->getMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id',
            ]);

            // Open access public
            $permission = new \Google\Service\Drive\Permission([
                'type' => 'anyone',
                'role' => 'reader',
            ]);
            $drive->permissions->create($result->id, $permission);

            // Return link Google Drive
            return 'https://drive.google.com/file/d/' . $result->id . '/view';
        } catch (\Exception $e) {
            Log::error('Google Drive upload error: ' . $e->getMessage());
            throw new \Exception('Failed to upload to Google Drive: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $showUserStories = UserStory::where('id', $id)->get();
        return view('admin.detail.PageDetailUserHistory', compact('showUserStories'), ['title' => 'Detail Employee History']);
    }

    public function edit($id)
    {
        $editUserStories = UserStory::where('id', $id)->get();
        return view('admin.edit.PageEditUserHistory', compact('editUserStories'), ['title' => 'Edit Employee History']);
    }

    public function update(Request $request, string $id)
    {
        $userStory = UserStory::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:user_stories,email,' . $id,
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'street_address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'ktp_number' => 'required|string|max:20|unique:user_stories,ktp_number,' . $id,
            'position' => 'required|string|max:100',
            'bank_account_name' => 'required|string|max:150',
            'bank_account_number' => 'required|string|max:50',
            'scan_ktp_url_drive' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Jika ada file scan KTP baru yang diupload
        if ($request->hasFile('scan_ktp_url_drive')) {
            // Upload file baru ke Google Drive
            $validatedData['scan_ktp_url_drive'] = $this->uploadDrive($request->file('scan_ktp_url_drive'));
        }

        $userStory->update($validatedData);

        return redirect()->route('userstory.index')->with('success', 'User story updated successfully.');
    }

    public function destroy(string $id)
    {
        $deleteUserStories = UserStory::findOrFail($id);
        $deleteUserStories->delete();
        return redirect()->route('userstory.index')->with('success', 'User story deleted successfully.');
    }
}
