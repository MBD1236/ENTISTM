<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label>
            <span class="fas fa-plus-circle"></span>
            <input type="file" class="upload-attachment" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.gif,.bmp,.tiff,.webp,.svg">
        </label>
        <button class="emoji-button"><i class="fas fa-smile"></i></button>
        <textarea name="message" class="m-send app-scroll" placeholder="Tapper un message..."></textarea>
        <button class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>


