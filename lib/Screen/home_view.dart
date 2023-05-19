import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:formstate/screen/form_data_Screen.dart';
import 'package:formstate/model/model_user.dart';
import 'package:formstate/provider/add_edit_data.dart';
import 'package:formstate/provider/view_data.dart';
import 'package:http/http.dart';
import 'package:provider/provider.dart';

class HomeView extends StatefulWidget {
  @override
  _HomeViewState createState() => _HomeViewState();
}

class _HomeViewState extends State<HomeView> {
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
        create: (BuildContext context) => ViewData(),
        child: Scaffold(
            floatingActionButton:
                Consumer<ViewData>(builder: (context, value, child) {
              return FloatingActionButton(
                child: const Icon(Icons.add),
                onPressed: () {
                  Navigator.push(
                      context,
                      MaterialPageRoute(
                          builder: (context) => FormDataView(
                                id: '',
                              )));
                },
              );
            }),
            appBar: AppBar(
              title: Text('Data Pekerja'),
            ),
            body: Consumer<ViewData>(builder: (context, value, child) {
              return RefreshIndicator(
                  onRefresh: () => value.refresh(),
                  child: value.isLoading
                      ? const Center(child: CircularProgressIndicator())
                      : value.users.isEmpty
                          ? Center(child: Text("Tidak ada data"))
                          : ListView.builder(
                              itemCount: value.users.length,
                              itemBuilder: (context, index) {
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
                                          padding: EdgeInsets.symmetric(
                                              vertical: 8, horizontal: 16),
                                          child: Column(
                                            mainAxisAlignment:
                                                MainAxisAlignment.start,
                                            crossAxisAlignment:
                                                CrossAxisAlignment.start,
                                            children: [
                                              Text(
                                                'Nama : ${value.users[index]['nama'].toString()}',
                                                style: TextStyle(
                                                  fontSize: 14,
                                                  height: 1.5,
                                                  fontWeight: FontWeight.w500,
                                                ),
                                              ),
                                              Text(
                                                'Alamat: ${value.users[index]['alamat'].toString()}',
                                                style: TextStyle(
                                                  fontSize: 14,
                                                  height: 1.5,
                                                  overflow:
                                                      TextOverflow.visible,
                                                  fontWeight: FontWeight.w500,
                                                ),
                                              ),
                                              Text(
                                                'No Hp: ${value.users[index]['phone'].toString()}',
                                                style: TextStyle(
                                                  fontSize: 14,
                                                  height: 1.5,
                                                  fontWeight: FontWeight.w500,
                                                ),
                                              ),
                                              Text(
                                                'Pendidikan : ${value.users[index]['pendidikan'].toString()}',
                                                style: TextStyle(
                                                  fontSize: 14,
                                                  height: 1.5,
                                                  fontWeight: FontWeight.w500,
                                                ),
                                              ),
                                              Container(
                                                width: MediaQuery.of(context)
                                                    .size
                                                    .width,
                                                child: Column(
                                                  mainAxisAlignment:
                                                      MainAxisAlignment.start,
                                                  crossAxisAlignment:
                                                      CrossAxisAlignment.start,
                                                  children: [
                                                    Text(
                                                      'Pekerjaan :',
                                                      style: TextStyle(
                                                        fontSize: 14,
                                                        height: 1.5,
                                                        fontWeight:
                                                            FontWeight.w500,
                                                      ),
                                                    ),
                                                    if (value.users[index]
                                                            ['pekerjaan'] !=
                                                        null)
                                                      ...value.users[index]
                                                              ['pekerjaan']
                                                          .map((pekerjaan) =>
                                                              Text(
                                                                '${pekerjaan['pekerjaan'].toString()}, ${pekerjaan['waktu'].toString()} Tahun',
                                                                style:
                                                                    TextStyle(
                                                                  fontSize: 14,
                                                                  height: 1.5,
                                                                  fontWeight:
                                                                      FontWeight
                                                                          .w500,
                                                                ),
                                                              ))
                                                          .toList()
                                                  ],
                                                ),
                                              ),
                                            ],
                                          ),
                                        ),
                                        Row(
                                          mainAxisAlignment:
                                              MainAxisAlignment.center,
                                          children: [
                                            InkWell(
                                              onTap: () {
                                                showDialog(
                                                  context: context,
                                                  builder:
                                                      (BuildContext context) {
                                                    return AlertDialog(
                                                      title:
                                                          Text('Hapus data?'),
                                                      content: Text(
                                                          'Apakah Anda yakin ingin menghapus data ini?'),
                                                      actions: <Widget>[
                                                        TextButton(
                                                          child: Text('No'),
                                                          onPressed: () =>
                                                              Navigator.pop(
                                                                  context,
                                                                  'No'),
                                                        ),
                                                        TextButton(
                                                          child: Text('Yes'),
                                                          onPressed: () {
                                                            Navigator.pop(
                                                                context, 'Yes');
                                                            value.deleteData(
                                                                value.users[
                                                                        index]
                                                                    ['id']);
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
                                                    borderRadius:
                                                        BorderRadius.circular(
                                                            10),
                                                    color: Colors.red),
                                                child: Row(
                                                  mainAxisAlignment:
                                                      MainAxisAlignment.center,
                                                  children: [
                                                    Text(
                                                      "Delete",
                                                      style: TextStyle(
                                                          fontSize: 14.0,
                                                          color: Colors.white),
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
                                                            FormDataView(
                                                                id: value.users[
                                                                        index]
                                                                        ['id']
                                                                    .toString())));
                                              },
                                              child: Container(
                                                width: 80,
                                                height: 30,
                                                decoration: BoxDecoration(
                                                    borderRadius:
                                                        BorderRadius.circular(
                                                            10),
                                                    color: Colors.blue),
                                                child: Row(
                                                  mainAxisAlignment:
                                                      MainAxisAlignment.center,
                                                  children: [
                                                    Text(
                                                      "Edit",
                                                      style: TextStyle(
                                                          fontSize: 14.0,
                                                          color: Colors.white),
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
                            ));
            })));
  }
}
