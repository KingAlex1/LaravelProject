<form enctype="multipart/form-data" class="form-horizontal" action="/setting/category/create"
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
        <label for="inputDesc" class="col-sm-2 control-label">Описание</label>
        <div class="col-sm-10">
                    <textarea cols="3" rows="2" class="form-control"
                              id="inputDesc"
                              name="description">
                    </textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputSub" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <input type="submit" class="form-control form-sumbit" id="inputSub"
                   name="submit"
                   placeholder="Отправить">
        </div>
    </div>
</form>