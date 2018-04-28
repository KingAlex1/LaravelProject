<form enctype="multipart/form-data" class="form-horizontal" action="/setting/good/create"
      method="post">
    {{csrf_field()}}
    <div class="form-group">
        <label for="inputFile" class="col-sm-2 control-label">Название</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputFile"
                   name="name"
                   placeholder="Название">
        </div>
    </div>
    <div class="form-group">
        <label for="inputFile" class="col-sm-2 control-label">Категория</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputFile"
                   name="category"
                   placeholder="категория">
        </div>
    </div>
    <div class="form-group">
        <label for="inputFile" class="col-sm-2 control-label">Цена</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputFile"
                   name="price"
                   placeholder="цена">
        </div>
    </div>
    <div class="form-group">
        <label for="inputDesc" class="col-sm-2 control-label">Описание</label>
        <div class="col-sm-10">
                    <textarea cols="3" rows="2" class="form-control"
                              id="inputDesc"
                              name="description">
                    </textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="formImage" class="col-sm-2 control-label">Картинка</label>
        <div class="col-sm-10">
            <input
                    type="file"
                    name="image"
                    class="form-control"
                    id="formImage"
                    placeholder="картинка">
        </div>
    </div>


    <div class="form-group">
        <label for="inputSub" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <input type="submit" class="form-control" id="inputSub"
                   name="submit"
                   placeholder="Отправить">
        </div>
    </div>
</form>