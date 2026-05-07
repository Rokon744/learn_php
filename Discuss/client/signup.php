<div class="container mt-20">
    <h1 class="text-5xl font-bold mb-10">Sign Up</h1>
    <form action="./server/requests.php" method="post">
        <div class="flex flex-col mb-4">
            <label for="usename">User Name</label>
            <input type="text" placeholder="User name" name="username" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="useremail">User Email</label>
            <input type="text" placeholder="User email" name="email" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="userpassword">User Password</label>
            <input type="password" placeholder="User password" name="password" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="useraddress">User Address</label>
            <input type="text" placeholder="User Address" name="address" required>
        </div>
        <div class="mb-4">
            <button type="submit" name="signup" class="px-6 py-2 rounded-sm bg-blue-800 text-white">Submit</button>
        </div>
    </form>
</div>