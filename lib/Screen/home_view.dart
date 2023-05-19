import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:formstate/Screen/form_data_Screen.dart';
import 'package:formstate/model/model_user.dart';
import 'package:formstate/widget/list_data.dart';
import 'package:http/http.dart';

import '../bloc/data_user_bloc.dart';
import '../bloc/data_user_event.dart';
import '../bloc/data_user_state.dart';

class HomeView extends StatefulWidget {
  @override
  _HomeViewState createState() => _HomeViewState();
}

class _HomeViewState extends State<HomeView> {
  @override
  Widget build(BuildContext context) {
    return BlocProvider(
        create: (context) => DataUserBloc(),
        child: Scaffold(
            floatingActionButton: FloatingActionButton(
              child: const Icon(Icons.add),
              onPressed: () {
                Navigator.push(
                    context,
                    MaterialPageRoute(
                        builder: (context) => FormDataView(
                              id: 0,
                            )));
              },
            ),
            appBar: AppBar(
              title: Text('Data Pekerja'),
            ),
            body: BlocBuilder<DataUserBloc, DataUserState>(
              builder: (context, state) {
                final bloc = context.read<DataUserBloc>();

                if (state is DataUserInitialState) {
                  bloc?.add(GetDataUserEvent());
                }

                if (state is DataUserLoadingState) {
                  return const Center(child: CircularProgressIndicator());
                }

                if (state is DataUserSuccessState) {
                  return RefreshIndicator(
                    onRefresh: () async {
                      bloc?.add(GetDataUserEvent());
                    },
                    child: ListData(),
                  );
                }

                return const Center(child: Text('Data tidak ditemukan'));
              },
            )));
  }
}
