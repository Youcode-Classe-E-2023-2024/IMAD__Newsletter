<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the file upload form */
        .file-upload-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: 2px dashed rgb(82, 82, 82);
            background-color: #ddd;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .file-upload-form:hover {
            background-color: rgb(14, 14, 14);
        }

        .file-upload-label input {
            display: none;
        }

        .file-upload-label svg {
            height: 50px;
            fill: rgb(82, 82, 82);
            margin-bottom: 20px;
        }

        .file-upload-design {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .browse-button {
            background-color: rgb(82, 82, 82);
            padding: 5px 15px;
            border-radius: 10px;
            color: white;
            transition: all 0.3s;
            cursor: pointer;
        }

        .browse-button:hover {
            background-color: rgb(14, 14, 14);
        }
        .containerst {
            
  --s: 50px; /* control the size */
  --c1: #999; /* Lightened from #1d1d1d */
        --c2: #ccc; /* Lightened from #4e4f51 */
        --c3: #8c8c8c; /* Lightened from #3c3c3c */

  background: repeating-conic-gradient(
        from 30deg,
        #0000 0 120deg,
        var(--c3) 0 180deg
      )
      calc(0.5 * var(--s)) calc(0.5 * var(--s) * 0.577),
    repeating-conic-gradient(
      from 30deg,
      var(--c1) 0 60deg,
      var(--c2) 0 120deg,
      var(--c3) 0 180deg
    );
  background-size: var(--s) calc(var(--s) * 0.577);
}
.containerpage {
    
  --color: #E1E1E1;
  background-color: #F3F3F3;
  background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
      linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
  background-size: 55px 55px;
}
    </style>
</head>
<body class="containerpage h-screen flex flex-col  overflow-hidden" >
    
    <!-- Navigation Bar -->
    <nav class="bg-gray-200  shadow shadow-gray-300 w-full px-8 md:px-auto">
        <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
            <div class="text-indigo-500 md:order-1">
                <img width="48" height="48" src="https://img.icons8.com/fluency/48/mailing.png" alt="mailing"/>
            </div>
            <div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
                <ul class="flex font-semibold justify-between">
                    <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Dashbord">Dashboard</a></li>
                    <li class="md:px-4 md:py-2 text-indigo-500"><a href="/Ressources">Resources</a></li>
                    <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Workspace">Workspace</a></li>
                    <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Management">Management</a></li>
                </ul>
            </div>
            <div class="order-2 md:order-3">
                <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-gray-50 rounded-xl flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-1 border flex p-6 w-full  h-5/6">
    <div style=" box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); filter: blur(.5px); " class=" overflow-hidden py-4 containerst rounded-lg w-1/2 h-full bg-gray-200">
    <div style="  text-align: center; color: #fff;">
        <span class="text-2xl font-mono w-full  shadow-2xl text-black opacity-100">Welcome to the resource session. Upload images and videos to use in templates.</span>
    </div>
    <img style="width: 100%; height: 100%; " class="py-10" src="/storage/photos/undraw_memory_storage_reh0.svg" alt="">
    
</div>


        <div class="w-1/2 h-full flex items-center justify-center">
            <!-- File Upload Form -->
            <!-- File Upload Form -->
<form class="file-upload-form" action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Label for styling purposes -->
    <label for="file" class="file-upload-label">
        <div class="file-upload-design">
            <svg viewBox="0 0 640 512" height="1em">
                <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"></path>
            </svg>
            <p>Drag and Drop</p>
            <p>or</p>
            <span class="browse-button">Browse file</span>
        </div>
    </label>
    <!-- File input -->
    <input type="file" name="photos[]" id="file" multiple accept="image/*, video/*" class="hidden" />
    <!-- Submit button -->
    <button type="submit">Upload Photos</button>
</form>

        </div>
    </div>
</body>

</html>
