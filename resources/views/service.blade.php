@extends('layouts.app2')

@section('title', 'Durian Online: guarantee premeime grade')

@section('content')
<section class="page-section">
    <div class="container">
        <div class="about-heading-content">
            <div class="bg-faded rounded p-5">
                <div class="text-right">
                </div>
                <table class="table table-striped table-hover table-reflow">
                    <h1 class="text-center">การจัดการบริการ</h1>
                    <thead>
                        <tr>
                            <th style="width:150px;" class="text-center"><strong> รหัส </strong></th>
                            <th class="text-center"> บริการ </strong></th>


                            <th class="text-center"> คำอธิบาย </strong></th>
                            <th class="text-center"> รูป </strong></th>

                            <th class="text-right"  colspan="3"><button class="btn btn-success" data-toggle="modal" data-target="#addModal">Add</button></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td class="text-center"> {{ $service->id }} </td>
                            <td class="text-center"> {{ $service->service_name }}</td>
                            <td class="text-center"> {{ $service->price}}</td>
                            <td class="text-center"> {{ $service->unit }}</td>
                            <td class="text-center"> {{ $service->desc }}</td>
                            <td class="text-center"><button>
                                <img src="pics/{{ $service->pic}}" width="200"></button></a></td>
                            {{-- <td class="text-right" colspan="3">
                            <a class="btn btn-primary" data-toggle="modal"  data-target="#editModal" href="#" >แก้ไข</a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="/service" enctype="multipart/form-data" >
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">เพิ่มบริการ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-7">
                    <label>ชื่อบริการ</label>
                    <input type="text" name="service_name" class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="col-7">
                    <label>รายละเอียด</label>
                    <input type="text" type="text" name="desc" class="form-control">
                </div>
            </div>
            <div class="modal-body">
                <div class="col-7">
                    <label>ราคา</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>
            </div><div class="modal-body">
                <div class="col-7">
                    <label>หน่วย</label>
                    <input type="number" name="unit" id="unit" class="form-control">
                </div>
                <div class="col-7">
                    <label>รูป</label>
                    <input type="file"  name = "pic" id="pic" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content"  method="POST" action="/grade">
            @csrf @method('put')
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">=======</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>======</label>
                <!-- <input type="text" id="id" name="id" class="form-control"> -->
                <input type="text" id="grade" name="grade" class="form-control" >
            </div>
            <div class="modal-body">
                <div class="col-7">
                    <label>คำอธิบาย</label>
                    <textarea name="desc_grade" id="desc_grade" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </form>
    </div>
</div>
@endsection
{{--
@section('script')
<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var grade = button.data('grade') // Extract info from data-* attributes
        var modal = $(this)
        modal.find('.modal-title').text('แก้ไขเกรด: ' + grade);
        modal.find('.modal-content').attr('action', '/grade/'+id);
        modal.find('.modal-body input#grade').val(grade)
    });
</script>
@endsection --}}
