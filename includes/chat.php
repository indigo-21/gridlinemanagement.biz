 <!-- <div id="center-text">
    <h2>ChatBox UI</h2>
    <p>Message send and scroll to bottom enabled </p>
</div> -->
 <div id="body">

     <div id="chat-circle" class="btn btn-raised">
         <div id="chat-overlay"></div>
         <img src="./images/chat.png" alt="">
     </div>

     <div class="chat-box">
         <div class="chat-box-header text-left">
             <img src="./assets/img/chat.png" style="height:40px; " alt="">
             <b> Live Chat</b>
             <span class="chat-box-toggle"><i class="fa fa-times-circle"></i></span>
         </div>

         <div class="chat-box-body">
             <div class="chat-box-overlay">
             </div>
             <div class="chat-logs">

             </div><!--chat-log -->
         </div>
         <div class="chat-input">
             <form>
                 <input type="text" id="chat-input" placeholder="Send a message..." />
                 <button type="" class="chat-submit" id="chat-submit"><i class="fa fa-paper-plane"></i></button>
             </form>
         </div>
     </div>
 </div>