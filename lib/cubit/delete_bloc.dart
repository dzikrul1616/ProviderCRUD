import 'package:flutter_bloc/flutter_bloc.dart';

import '../bloc/data_user_event.dart';
import '../repository/data_user_repository.dart';
import 'delete_state.dart';

class DeleteBloc extends Cubit<DeleteState> {
  DeleteBloc() : super(ItemInitial());

  Future<void> deleteData(id) async {
    emit(ItemDeleting());
    try {
      await DataUserRepository().deleteData(id);
      emit(ItemDeleted());
    } catch (e) {
      emit(ItemFailed("Gagal Hapus Item: $e"));
    }
  }
}