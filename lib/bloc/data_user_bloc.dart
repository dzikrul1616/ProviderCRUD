import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:formstate/model/model_user.dart';
import 'package:formstate/repository/data_user_repository.dart';

import 'data_user_event.dart';
import 'data_user_state.dart';

class DataUserBloc extends Bloc<DataUserEvent, DataUserState> {
  DataUserRepository dataUserRepository = DataUserRepository();
  DataUserBloc() : super(DataUserInitialState()) {
    on<DataUserEvent>((event, emit) async {
      if (event is GetDataUserEvent) {
        await getDataUser(emit);
      }
    });
  }

  Future<void> getDataUser(Emitter<DataUserState> emit) async {
    emit(DataUserLoadingState());
    try {
      List<ModelUser>? data = await dataUserRepository.getDataUser();
      if (data?.isNotEmpty == true) {
        print(data);
        emit(DataUserSuccessState(data!));
      } else {
        print(data);
        emit(DataUserEmpty());
      }
    } catch (e) {
      emit(DataUserErrorState(e.toString()));
    }
  }
}
