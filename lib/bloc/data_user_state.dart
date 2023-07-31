import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:formstate/model/model_user.dart';

abstract class DataUserState {}

class DataUserInitialState extends DataUserState {}

class DataUserLoadingState extends DataUserState {}

class DataUserSuccessState extends DataUserState {
  final List<ModelUser> data;
  DataUserSuccessState(this.data);
}

class DataUserErrorState extends DataUserState {
  final String message;
  DataUserErrorState(this.message);
}

class DataUserEmpty extends DataUserState {}
