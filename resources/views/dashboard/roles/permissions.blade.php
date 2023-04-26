<div class="row">
    <!-- column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body box bg-cyan ">
                <h4 class="card-title text-white">إضافة الأدوار</h4>
            </div>
            <div class="comment-widgets">

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-rightcontrol-label col-form-label">
                            العنوان
                            الأدوار </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control   " id="name"
                                placeholder="العنوان الأدوار" name="name" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body box bg-info ">
                <h4 class="card-title text-white">
                    <i class="mdi mdi-check-all check-all"></i>
                    المستخدمين
                </h4>

            </div>
            <div class="comment-widgets">
                <div class="card-body">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="users1" value="users create">
                        <label class="custom-control-label" for="users1">
                            إنشاء مستخدم
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="users2" value="users read">
                        <label class="custom-control-label" for="users2">
                            عرض المستخدم
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="users3" value="users update">
                        <label class="custom-control-label" for="users3">
                            تحديث المستخدم
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="users4" value="users delete">
                        <label class="custom-control-label" for="users4">
                            حذف المستخدم </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body box bg-info ">
                <h4 class="card-title text-white">
                    الصفحات الثابتة
                    <i class="mdi mdi-check-all check-all"></i>
                </h4>

            </div>
            <div class="comment-widgets">
                <div class="card-body">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="pages5" value="pages create">
                        <label class="custom-control-label" for="pages5">
                            إنشاء صفحة ثابتة
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="pages6" value="pages read">
                        <label class="custom-control-label" for="pages6">
                            عرض صفحة ثابتة
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="pages7" value="pages update">
                        <label class="custom-control-label" for="pages7">
                            تحديث صفحة ثابتة
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="pages8" value="pages delete">
                        <label class="custom-control-label" for="pages8">
                            حذف صفحة ثابتة </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body box bg-info ">
                <h4 class="card-title text-white">
                    الصور المتحركة
                    <i class="mdi mdi-check-all check-all"></i>
                </h4>

            </div>
            <div class="comment-widgets">
                <div class="card-body">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="sliders9" value="sliders create" >
                        <label class="custom-control-label" for="sliders9">
                            إنشاء الصور المتحركة
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="sliders10" value="sliders read">
                        <label class="custom-control-label" for="sliders10">
                            عرض الصور المتحركة
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="sliders11" value="sliders update">
                        <label class="custom-control-label" for="sliders11">
                            تحديث الصور المتحركة
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="sliders12" value="sliders delete">
                        <label class="custom-control-label" for="sliders12">
                            حذف الصور المتحركة </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body box bg-info ">
                <h4 class="card-title text-white">
                    تواصل معنا
                    <i class="mdi mdi-check-all check-all"></i>
                </h4>

            </div>
            <div class="comment-widgets">
                <div class="card-body">
                    {{-- <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="users13" value="users create">
                        <label class="custom-control-label" for="users13">
                            إنشاء الأعضاء
                        </label>
                    </div> --}}
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="contacts14" value="contacts read">
                        <label class="custom-control-label" for="contacts14">
                            عرض الرسائل
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="contacts15" value="contacts update">
                        <label class="custom-control-label" for="contacts15">
                            تحديث الرسائل
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                            id="contacts16" value="contacts delete">
                        <label class="custom-control-label" for="contacts16">
                            حذف الرسائل </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-12">
        <div class="card">
            <div class="comment-widgets">
                <div class="border-top">
                    <div class="card-body text-left">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="reset" class="btn btn-warning">إعادة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>