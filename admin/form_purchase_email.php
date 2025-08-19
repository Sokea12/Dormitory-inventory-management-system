<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

<style>
  
  #quill-toolbar {
    resize: none; /* Disable manual resizing */
    overflow: hidden; /* Hide scrollbar */
    height: 100px;
    min-height: 100px; /* Set minimum height */
    max-height: 100px;
}
#image-preview {
    margin-top: 10px;
    max-width: 1%;
    height: auto;
}
</style>

    <form id="sendmail" action="../sendemail/send.php?or_id=<?=$_GET['or_id'];?>" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card pt-2 pl-3 pr-3 pb-3">
                        <div class="tab-content" id="myTabContent-2">
                        <div class="row">
                           <div class="col-md-12">
                                <h4 class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                    សរសេរសារ៖
                                </h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">ប្រធានបទ៖</label>
                                    <input type="hidden" id="hiddenOrid" name="hiddenOrid">
                                    <input type="text" name="subject" class="form-control" value="" placeholder="សូមបញ្ចូលប្រធានបទ" data-errors="សូមបញ្ចូលប្រធានបទ" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">ទៅ៖</label>
                                    <input type="email" name="email" class="form-control" value="" placeholder="សូមបញ្ចូលអុីមែល" data-errors="សូមបញ្ចូលអុីមែល" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">សារ៖</label>
                                        <input type="hidden" id="message" name="message">
                                        <div id="content-container">
                                            <div id="quill-tool">
                                                <button class="ql-bold" data-toggle="tooltip" data-placement="bottom" title="Bold"></button>
                                                <button class="ql-underline" data-toggle="tooltip" data-placement="bottom" title="Underline"></button>
                                                <button class="ql-italic" data-toggle="tooltip" data-placement="bottom" title="Add italic text <cmd+i>"></button>
                                                <button class="ql-image" data-toggle="tooltip" data-placement="bottom" title="Upload image"></button>
                                                <button class="ql-code-block" data-toggle="tooltip" data-placement="bottom" title="Show code"></button>
                                            </div>
                                            <div class="quill-toolbar" id="quill-toolbar" name="quill-toolbar" oninput="messageTosupplies()">
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('message').value = " ";
                                            if (jQuery("#quill-toolbar").length) {
                                            var quill = new Quill('#quill-toolbar', {
                                                modules: {
                                                    toolbar: '#quill-tool'
                                                },
                                                placeholder: 'Compose an epic...',
                                                theme: 'snow'
                                            });
                                        }

                                        function messageTosupplies(){
                                            var message = document.getElementById('content-container').innerText; 
                                            document.getElementById('message').value = message;
                                            // alert("message");
                                        }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-2">
                            <a type="button" class="btn btn-secondary mb-3 mr-2" href="form_purchease_list.php?massage=1">
                                បោះបង់
                            </a>
                            <button type="submit" name="send" class="btn btn-primary mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 24 24"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                                <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                </svg>
                                ផ្ញើ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php
    include("main_foother.php");
    ?>

<script>
    function autoResize() {
        // Auto-resize textarea based on content
        var textArea = document.getElementById('editor');
        textArea.style.height = 'auto';
        textArea.style.height = textArea.scrollHeight + 'px';
    }
</script>
