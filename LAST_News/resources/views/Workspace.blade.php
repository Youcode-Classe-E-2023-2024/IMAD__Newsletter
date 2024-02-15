<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<style>
    .containerpage {
 
  --color: #E1E1E1;
  background-color: #F3F3F3;
  background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
      linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
  background-size: 55px 55px;
}
</style>
<body class=" flex flex-col h-screen overflow-hidden containerpage" style="background: #edf2f7;">

    <!-- Navigation Bar -->
    <nav class="bg-gray-200 shadow shadow-gray-300 w-full px-8 md:px-auto">
        <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
            <div class="text-indigo-500 md:order-1">
                <img width="48" height="48" src="https://img.icons8.com/fluency/48/mailing.png" alt="mailing"/>
            </div>
            <div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
                <ul class="flex font-semibold justify-between">
                <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Dashbord">Dashboard</a></li>
                    <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="/Ressources">Resources</a></li>
                    <li class="md:px-4 md:py-2 text-indigo-500"><a href="/Workspace">Workspace</a></li>
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
<div class="flex-1 border flex p-6 overflow-hidden gap-6 w-full h-screen">

    
 
    <div class="flex-1 flex flex-col">
        <div class="mb-4">
            <p class="text-xl font-semibold mb-2">Tool Bar</p>
            <div class="flex items-center gap-4 p-3 border rounded-md justify-around w-3/5 m-auto">
                <!-- Replace with your actual SVG elements -->
                <img onclick="undo()" width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/undo.png" alt="undo"/>
                <img onclick="addnode()" class="switcher" width="30" height="30" src="https://img.icons8.com/ios/50/change.png" alt="add--v1"/>
                 
                    <!-- SVG content -->
              
                    <img onclick="showimages()" onclick="" width="30" height="30" src="https://img.icons8.com/ios/30/image-gallery.png" alt="image-gallery"/>
                    <img onclick="showinput()" width="30" height="30" src="https://img.icons8.com/ios/30/text.png" alt="text"/>
            </div>
        </div>
        <input type="text" id="textInput" placeholder="Enter text" class="mb-4 hidden p-2 border border-gray-300 rounded-md">


                <!-- resources/views/Workspace.blade.php -->

                <div class="photoscontainer" style="display: none; grid-template-columns: repeat(2, 1fr); gap: 16px; max-height: 300px; overflow-x: auto; white-space: nowrap; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; border-radius: 8px; padding: 8px;">
    @foreach ($photoNames as $photoName)
        <img 
            src="{{ asset('storage/photos/' . $photoName) }}" 
            alt="{{ $photoName }}" 
            style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); cursor: pointer;"
            onclick="handleImageClick(this)"
            onmouseover="this.style.opacity=0.8" 
            onmouseout="this.style.opacity=1"
        >
    @endforeach
</div>



   <script>
    
    var photoname = "" ;
    function handleImageClick(image) {
        console.log('Clicked on photo:', image.src);
        photoname = image.src;
        // You can perform any other actions with the image source here
    }
    function photoempty(element){
	console.log("hi" , photoname)
        element.src = photoname

  }
  function showimages() {
            var photosContainer = document.querySelector('.photoscontainer');
            photosContainer.style.display = (photosContainer.style.display === 'none') ? 'grid' : 'none';
        }
</script>





        <button onclick="sendEmail()" class="px-4 py-2 mt-auto  bg-indigo-500 hover:bg-indigo-600 text-white rounded-xl flex justify-center items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="font-semibold ">Ready to Publish</span>
        </button>
    </div>


    <div class=" rightTemplate   border border-gray-600 rounded-lg shadow-xl   h-full  overflow-y-auto  py-1   flex-1 ">
        <div class="templatepage "> <x-template2 /></div>
        <div class="templatepage"> <x-Shop /></div>
         <div  class="templatepage "> <x-RightTemplate /></div>
         
    </div>
    <script>
        console.log("bda")
        var pages = document.querySelectorAll('.templatepage');
var l = 0;
hideall(l);

function hideall(index) {
    pages.forEach((element, i) => {
        if (i !== index) {
            element.style.display = "none";
        } else {
            element.style.display = "block";
        }
    });
}

document.querySelector('.switcher').addEventListener('click', (event) => {
    l++;
    if (l === pages.length) {
        l = 0;
    }
    hideall(l);
});

    </script>
</div>

</body>
</html>
<!-- Your Blade view file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   function showinput() {
    var inputElement = document.getElementById("textInput");
    if (inputElement) {
        inputElement.style.display = (inputElement.style.display === "none" || inputElement.style.display === "") ? "block" : "none";
    }
}

    function sendEmail() {


        var emailContent = $('.rightTemplate').html(); // Replace 'rightTemplate' with the ID or class of your template div
        console.log(emailContent)
        
        $.ajax({
            type: 'POST',
            url: '{{ route("send-email") }}',
            data: {
                emailContent: emailContent,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response.text)
                if (response.success) {
                    
                    alert('Email sent successfully!');
                } else {
                    alert('Failed to send email.');
                }
            },
            error: function() {
                alert('Error sending email.');
            }
        });
    }
</script>

