import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:formstate/Screen/formdataScreen.dart';
import 'package:formstate/model/form.dart';
import 'package:formstate/provider/adddata.dart';
import 'package:formstate/provider/view.dart';
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
            floatingActionButton: FloatingActionButton(
              child: const Icon(Icons.add),
              onPressed: () {
                Navigator.push(context,
                    MaterialPageRoute(builder: (context) => FormDataView()));
              },
            ),
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
                    return Column(
                      children: [
                        Padding(
                          padding:
                              EdgeInsets.symmetric(vertical: 8, horizontal: 16),
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.start,
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'Nama : ${formData.nama}',
                                style: TextStyle(
                                  fontSize: 14,
                                  height: 1.5,
                                  fontWeight: FontWeight.w500,
                                ),
                              ),
                              Text(
                                'Alamat: ${formData.alamat}',
                                style: TextStyle(
                                  fontSize: 14,
                                  height: 1.5,
                                  overflow: TextOverflow.visible,
                                  fontWeight: FontWeight.w500,
                                ),
                              ),
                              Text(
                                'No Hp: ${formData.no_hp}',
                                style: TextStyle(
                                  fontSize: 14,
                                  height: 1.5,
                                  fontWeight: FontWeight.w500,
                                ),
                              ),
                              Text(
                                'Pendidikan : ${formData.pendidikan_terakhir}',
                                style: TextStyle(
                                  fontSize: 14,
                                  height: 1.5,
                                  fontWeight: FontWeight.w500,
                                ),
                              ),
                              Container(
                                child: ListView.builder(
                                  itemCount: 3,
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
                                          Text(formData.nama_pekerjaan[index]),
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
                        SizedBox(height: 16),
                      ],
                    );
                  },
                ),
              );
            })));
  }
}
