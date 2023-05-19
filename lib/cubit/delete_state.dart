import 'package:formstate/bloc/data_user_event.dart';

import '../bloc/data_user_bloc.dart';

abstract class DeleteState {}

class ItemInitial extends DeleteState {}

class ItemDeleting extends DeleteState {}

class ItemDeleted extends DeleteState {}

class ItemError extends DeleteState {
  final String error;
  ItemError(this.error);
}

class ItemFailed extends DeleteState {
  final String message;

  ItemFailed(this.message);
}
