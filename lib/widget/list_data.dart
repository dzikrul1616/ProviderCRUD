import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter/src/widgets/placeholder.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:formstate/cubit/delete_bloc.dart';
import 'package:formstate/model/model_user.dart';
import 'dart:convert';
import '../Screen/form_data_Screen.dart';
import '../bloc/data_user_bloc.dart';
import '../bloc/data_user_event.dart';
import '../bloc/data_user_state.dart';
import '../cubit/delete_state.dart';

class ListData extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return BlocBuilder<DataUserBloc, DataUserState>(builder: (context, state) {
      if (state is DataUserSuccessState) {
        return ListView.builder(
          itemCount: state.data.length,
          itemBuilder: (context, index) {
            ModelUser users = state.data[index];
            return Padding(
              padding: const EdgeInsets.all(8.0),
              child: Container(
                width: MediaQuery.of(context).size.width,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(10),
                  color: Colors.grey[200],
                ),
                child: Column(
                  children: [
                    Padding(
                      padding:
                          EdgeInsets.symmetric(vertical: 8, horizontal: 16),
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.start,
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Nama : ${users.nama.toString()}',
                            style: TextStyle(
                              fontSize: 14,
                              height: 1.5,
                              fontWeight: FontWeight.w500,
                            ),
                          ),
                          Text(
                            'Alamat: ${users.alamat.toString()}',
                            style: TextStyle(
                              fontSize: 14,
                              height: 1.5,
                              overflow: TextOverflow.visible,
                              fontWeight: FontWeight.w500,
                            ),
                          ),
                          Text(
                            'No Hp: ${users.phone.toString()}',
                            style: TextStyle(
                              fontSize: 14,
                              height: 1.5,
                              fontWeight: FontWeight.w500,
                            ),
                          ),
                          Text(
                            'Pendidikan : ${users.pendidikan.toString()}',
                            style: TextStyle(
                              fontSize: 14,
                              height: 1.5,
                              fontWeight: FontWeight.w500,
                            ),
                          ),
                          Container(
                            width: MediaQuery.of(context).size.width,
                            child: Column(
                              mainAxisAlignment: MainAxisAlignment.start,
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Text(
                                  'Pekerjaan :',
                                  style: TextStyle(
                                    fontSize: 14,
                                    height: 1.5,
                                    fontWeight: FontWeight.w500,
                                  ),
                                ),
                                if (users.pekerjaan.toString() != null)
                                  ...users.pekerjaan!
                                      .map((pekerjaan) => Text(
                                            '${pekerjaan.pekerjaan.toString()}, ${pekerjaan.waktu.toString()} Tahun',
                                            style: TextStyle(
                                              fontSize: 14,
                                              height: 1.5,
                                              fontWeight: FontWeight.w500,
                                            ),
                                          ))
                                      .toList()
                              ],
                            ),
                          ),
                        ],
                      ),
                    ),
                    BlocConsumer<DataUserBloc, DataUserState>(
                      listener: (context, state) {
                        if (state is ItemDeleted) {
                          context.read<DataUserBloc>().add(GetDataUserEvent());
                        }
                      },
                      builder: (context, state) {
                        final bloc = context.read<DataUserBloc>();
                        return Row(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: [
                            InkWell(
                              onTap: () {
                                final cubit = DeleteBloc();
                                showDialog(
                                  context: context,
                                  builder: (BuildContext context) {
                                    return AlertDialog(
                                      title: Text('Hapus data?'),
                                      content: Text(
                                          'Apakah Anda yakin ingin menghapus data ini?'),
                                      actions: <Widget>[
                                        TextButton(
                                          child: Text('No'),
                                          onPressed: () =>
                                              Navigator.pop(context, 'No'),
                                        ),
                                        TextButton(
                                          child: Text('Yes'),
                                          onPressed: () {
                                            Navigator.pop(context, 'Yes');
                                            cubit.deleteData(users.id!);
                                            bloc.add(GetDataUserEvent());
                                          },
                                        ),
                                      ],
                                    );
                                  },
                                );
                              },
                              child: Container(
                                width: 80,
                                height: 30,
                                decoration: BoxDecoration(
                                    borderRadius: BorderRadius.circular(10),
                                    color: Colors.red),
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: [
                                    Text(
                                      "Delete",
                                      style: TextStyle(
                                          fontSize: 14.0, color: Colors.white),
                                    ),
                                    const SizedBox(
                                      width: 5.0,
                                    ),
                                    Icon(
                                      Icons.delete,
                                      color: Colors.white,
                                    ),
                                    const SizedBox(
                                      width: 10.0,
                                    ),
                                  ],
                                ),
                              ),
                            ),
                            const SizedBox(
                              width: 10.0,
                            ),
                            InkWell(
                              onTap: () {
                                Navigator.push(
                                    context,
                                    MaterialPageRoute(
                                        builder: (context) =>
                                            FormDataView(id: users.id)));
                              },
                              child: Container(
                                width: 80,
                                height: 30,
                                decoration: BoxDecoration(
                                    borderRadius: BorderRadius.circular(10),
                                    color: Colors.blue),
                                child: Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: [
                                    Text(
                                      "Edit",
                                      style: TextStyle(
                                          fontSize: 14.0, color: Colors.white),
                                    ),
                                    const SizedBox(
                                      width: 5.0,
                                    ),
                                    Icon(
                                      Icons.edit,
                                      color: Colors.white,
                                    ),
                                    const SizedBox(
                                      width: 10.0,
                                    ),
                                  ],
                                ),
                              ),
                            ),
                          ],
                        );
                      },
                    ),
                    const SizedBox(
                      width: 10.0,
                    ),
                    const SizedBox(
                      height: 10.0,
                    ),
                  ],
                ),
              ),
            );
          },
        );
      } else {
        return const Center(child: Text('Data tidak ditemukan'));
      }
    });
  }
}
