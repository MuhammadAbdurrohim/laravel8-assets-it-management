<?php

return [

    'undeployable' 		=> '<strong>Cảnh báo: </strong> Tài sản này hiện tại đang được đánh dấu là không cho phép cấp phát.
                        Nếu tình trạng này đã được thay đổi, xin vui lòng cập nhật tình trạng tài sản.',
    'does_not_exist' 	=> 'Tài sản không tồn tại.',
    'does_not_exist_or_not_requestable' => 'Tài sản không tồn tại hoặc không cho phép đề xuất.',
    'assoc_users'	 	=> 'Tài sản này hiện tại đã được checkout đến một người dùng và không thể xóa. Đầu tiên xin vui lòng kiểm tra lại tài sản, và cố gắng thử lần nữa. ',

    'create' => [
        'error'   		=> 'Tài sản chưa được tạo, xin vui lòng thử lại. :(',
        'success' 		=> 'Tài sản được tạo thành công. :)',
        'success_linked' => 'Asset with tag :tag was created successfully. <strong><a href=":link" style="color: white;">Click here to view</a></strong>.',
    ],

    'update' => [
        'error'   			=> 'Tài sản chưa được cập nhật. Bạn hãy thử lại',
        'success' 			=> 'Tài sản được cập nhật thành công.',
        'nothing_updated'	=>  'Bạn đã không chọn trường nào vì thế đã không có gì được cập nhật.',
        'no_assets_selected'  =>  'Không có tài sản nào được chọn, vì vậy không có gì cập nhật.',
        'assets_do_not_exist_or_are_invalid' => 'Selected assets cannot be updated.',
    ],

    'restore' => [
        'error'   		=> 'Tài sản không được khôi phục, bạn hãy thử lại',
        'success' 		=> 'Tài sản được khôi phục thành công.',
        'bulk_success' 		=> 'Đã khôi phục thành công tài sản.',
        'nothing_updated'   => 'Không có tài sản nào được chọn nên không có tài sản nào được khôi phục.', 
    ],

    'audit' => [
        'error'   		=> 'Kiểm toán nội dung không thành công. Vui lòng thử lại.',
        'success' 		=> 'Kiểm tra thành công tài sản.',
    ],


    'deletefile' => [
        'error'   => 'Tập tin đã không được xoá. Bạn hãy thử lại.',
        'success' => 'Tập tin đã được xoá thành công.',
    ],

    'upload' => [
        'error'   => 'Tập tin đã không được tải lên. Bạn hãy thử lại.',
        'success' => 'Tập tin đã được tải lên thành công.',
        'nofiles' => 'Bạn chưa chọn tập tin để tải lên, hoặc tập tin bạn đang chọn tải lên có dung lượng quá lớn',
        'invalidfiles' => 'Một hoặc nhiều tập tin của bạn có dung lượng quá lớn hoặc có định dạng không được hỗ trợ. Những tập tin được hỗ trợ bao gồm: png, gif, jpg, doc, docx, pdf, và txt.',
    ],

    'import' => [
        'error'                 => 'Một số mặt hàng không nhập chính xác.',
        'errorDetail'           => 'Các mục sau đây không được nhập khẩu vì lỗi.',
        'success'               => 'Tệp của bạn đã được nhập',
        'file_delete_success'   => 'Tập tin của bạn đã được xóa thành công',
        'file_delete_error'      => 'Không thể xóa tệp',
        'file_missing' => 'Tệp đã chọn bị thiếu',
        'header_row_has_malformed_characters' => 'Một hoặc nhiều thuộc tính trong hàng tiêu đề chứa các ký tự không đúng định dạng UTF-8',
        'content_row_has_malformed_characters' => 'Một hoặc nhiều thuộc tính ở hàng đầu tiên của nội dung chứa ký tự không đúng định dạng UTF-8',
    ],


    'delete' => [
        'confirm'   	=> 'Bạn có chắc chắn muốn xoá bỏ tài sản này?',
        'error'   		=> 'Đã có vấn đề xảy ra khi xoá tài sản này. Bạn hãy thử lại xem.',
        'nothing_updated'   => 'Không có nội dung nào được chọn, vì vậy không có gì bị xóa.',
        'success' 		=> 'Tài sản này được xoá thành công.',
    ],

    'checkout' => [
        'error'   		=> 'Tài sản chưa được checkout, xin vui lòng thử lại',
        'success' 		=> 'Tài sản đã checkout thành công.',
        'user_does_not_exist' => 'Người dùng này không tồn tại. Bạn hãy thử lại.',
        'not_available' => 'Tài sản đó không có sẵn để thanh toán!',
        'no_assets_selected' => 'Bạn phải chọn ít nhất một mục trong danh sách',
    ],

    'checkin' => [
        'error'   		=> 'Tài sản chưa được checkin, xin vui lòng thử lại',
        'success' 		=> 'Tài sản đã checkin thành công.',
        'user_does_not_exist' => 'Người dùng này không tồn tại. Bạn hãy thử lại.',
        'already_checked_in'  => 'Nội dung đó đã được kiểm tra.',

    ],

    'requests' => [
        'error'   		=> 'Tài sản không được yêu cầu, vui lòng thử lại',
        'success' 		=> 'Tài sản đã yêu cầu thành công.',
        'canceled'      => 'Yêu cầu Thanh toán đã được hủy thành công',
    ],

];
