<!-- Modal -->
<div class="modal fade" id="user_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="user_editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="user_editLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('mypage') }}">
                 @csrf
                 <input type="hidden" name="_method" value="PUT">
                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="name" class="text-md-left samuraimart-edit-user-info-label">ユーザーネーム</label>
                     </div>
                     <div class="collapse show editUserName">
                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus placeholder="タロウ">
                         @error('name')
                         <span class="invalid-feedback" role="alert">
                             <strong>ユーザーネームを入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>
                 <br>
 
                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="email" class="text-md-left samuraimart-edit-user-info-label">メールアドレス</label>
                     </div>
                     <div class="collapse show editUserMail">
                         <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
                         @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>メールアドレスを入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>
                 <br>
 
 
                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="address" class="text-md-left samuraimart-edit-user-info-label">住所</label>
                     </div>
                     <div class="collapse show editUserPhone">
                         <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" required autocomplete="address" autofocus placeholder="東京都渋谷区道玄坂X-X-X">
                         @error('address')
                         <span class="invalid-feedback" role="alert">
                             <strong>住所を入力してください</strong>
                         </span>
                         @enderror
                     </div>
                 </div>
                 <br>
                 <div class="form-group">
                     <div class="d-flex justify-content-between">
                         <label for="comment" class="text-md-left">一言コメント</label>
                     </div>
                     <div >
                         <input id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{Auth::user()->comment }}" required autocomplete="comment" autofocus placeholder="こんにちは！">
                        
                     </div>
                 </div>
                 
 
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">更新</button>
        </form>
      </div>
    </div>
  </div>
</div>
