<x-layout title="Edit User">
    <x-users.form :action="route('users.update', $id)" :update="true" :user="$user"></x-users.form>
</x-layout>