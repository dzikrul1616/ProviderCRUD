import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:formstate/Screen/formdataScreen.dart';
import 'package:formstate/model/form.dart';
import 'package:formstate/provider/addeditdata.dart';
import 'package:formstate/provider/view.dart';
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
                onRefresh: value.refresh,
                child: ListView.builder(
                  itemCount: value.FormDataList.length,
                  itemBuilder: (context, index) {
                    FormData formData = value.FormDataList[index];
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
                                mainAxisAlignment: MainAxisAlignment.start,
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Text(
                                    'Nama : ${formData.pendidikan_terakhir}',
                                    style: TextStyle(
                                      fontSize: 14,
                                      height: 1.5,
                                      fontWeight: FontWeight.w500,
                                    ),
                                  ),
                                  Text(
                                    'Alamat: ${formData.nama}',
                                    style: TextStyle(
                                      fontSize: 14,
                                      height: 1.5,
                                      overflow: TextOverflow.visible,
                                      fontWeight: FontWeight.w500,
                                    ),
                                  ),
                                  Text(
                                    'No Hp: ${formData.alamat}',
                                    style: TextStyle(
                                      fontSize: 14,
                                      height: 1.5,
                                      fontWeight: FontWeight.w500,
                                    ),
                                  ),
                                  Text(
                                    'Pendidikan : ${formData.no_hp}',
                                    style: TextStyle(
                                      fontSize: 14,
                                      height: 1.5,
                                      fontWeight: FontWeight.w500,
                                    ),
                                  ),
                                  Container(
                                    child: ListView.builder(
                                      itemCount:
                                          formData.nama_pekerjaan.length < 3
                                              ? formData.nama_pekerjaan.length
                                              : formData.tahun.length < 3
                                                  ? formData.tahun.length
                                                  : 3,
                                      shrinkWrap: true,
                                      physics: NeverScrollableScrollPhysics(),
                                      itemBuilder: (context, index) {
                                        return Padding(
                                          padding: EdgeInsets.symmetric(
                                              vertical: 4, horizontal: 16),
                                          child: Row(
                                            mainAxisAlignment:
                                                MainAxisAlignment.spaceBetween,
                                            children: [
                                              Text(formData
                                                  .nama_pekerjaan[index]),
                                              Text(formData.tahun[index])
                                            ],
                                          ),
                                        );
                                      },
                                    ),
                                  ),
                                ],
                              ),
                            ),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: [
                                Container(
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
                                            fontSize: 14.0,
                                            color: Colors.white),
                                      ),
                                      const SizedBox(
                                        width: 5.0,
                                      ),
                                      InkWell(
                                        onTap: () => value.showAlertDialog(
                                            context,
                                            value.FormDataList[index].id),
                                        child: Icon(
                                          Icons.delete,
                                          color: Colors.white,
                                        ),
                                      ),
                                      const SizedBox(
                                        width: 10.0,
                                      ),
                                    ],
                                  ),
                                ),
                                const SizedBox(
                                  width: 10.0,
                                ),
                                Container(
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
                                            fontSize: 14.0,
                                            color: Colors.white),
                                      ),
                                      const SizedBox(
                                        width: 5.0,
                                      ),
                                      InkWell(
                                        onTap: () {
                                          Navigator.push(
                                              context,
                                              MaterialPageRoute(
                                                  builder: (context) =>
                                                      FormDataView(
                                                          id: value
                                                              .FormDataList[
                                                                  index]
                                                              .id)));
                                        },
                                        child: Icon(
                                          Icons.edit,
                                          color: Colors.white,
                                        ),
                                      ),
                                      const SizedBox(
                                        width: 10.0,
                                      ),
                                    ],
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
                ),
              );
            })));
  }
}
