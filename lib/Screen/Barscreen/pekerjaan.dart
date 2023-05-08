import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter/src/widgets/placeholder.dart';
import 'package:formstate/Screen/home.dart';
import 'package:formstate/model/model_user.dart';
import 'package:provider/provider.dart';

import '../../provider/add_edit_data.dart';

class PekerjaanView extends StatefulWidget {
  final String id;
  PekerjaanView({required this.id});
  @override
  State<PekerjaanView> createState() => _PekerjaanViewState();
}

class _PekerjaanViewState extends State<PekerjaanView> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        floatingActionButtonLocation: FloatingActionButtonLocation.centerFloat,
        floatingActionButton: Padding(
          padding: const EdgeInsets.symmetric(horizontal: 15.0),
          child: Consumer<addDataProvider>(builder: (context, provider, child) {
            return Container(
                width: MediaQuery.of(context).size.width,
                height: 260,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(10),
                  color: Colors.white,
                  boxShadow: [
                    BoxShadow(
                      color: Color(0x19000000),
                      blurRadius: 4,
                      offset: Offset(0, 6),
                    ),
                    BoxShadow(
                      color: Color(0x19000000),
                      blurRadius: 4,
                      offset: Offset(0, 6),
                    ),
                    BoxShadow(
                      color: Color(0x19000000),
                      blurRadius: 4,
                      offset: Offset(0, 6),
                    ),
                  ],
                ),
                child: Padding(
                  padding: EdgeInsets.symmetric(horizontal: 15.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const SizedBox(
                        height: 10.0,
                      ),
                      Text(
                        "Nama Pekerjaan",
                        style: TextStyle(
                          fontSize: 12.0,
                        ),
                      ),
                      const SizedBox(
                        height: 5.0,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Expanded(
                            child: TextFormField(
                              controller: provider.namapekerjaanController,
                              onChanged: (newValue) {
                                provider.kerja1.pekerjaan = newValue;
                              },
                              decoration: InputDecoration(
                                  filled: true,
                                  fillColor: Colors.grey[200],
                                  border: OutlineInputBorder(
                                      borderRadius: BorderRadius.circular(10),
                                      borderSide: BorderSide.none)),
                            ),
                          ),
                        ],
                      ),
                      const SizedBox(
                        height: 10.0,
                      ),
                      Text(
                        "Lama (Tahun)",
                        style: TextStyle(
                          fontSize: 12.0,
                        ),
                      ),
                      const SizedBox(
                        height: 5.0,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.end,
                        children: [
                          Expanded(
                            child: TextFormField(
                              onChanged: (newValue) {
                                provider.kerja1.waktu = newValue;
                              },
                              controller: provider.tahunController
                                ..text = initialYear.toString(),
                              decoration: InputDecoration(
                                  filled: true,
                                  fillColor: Colors.grey[200],
                                  border: OutlineInputBorder(
                                      borderRadius: BorderRadius.circular(10),
                                      borderSide: BorderSide.none)),
                            ),
                          ),
                          const SizedBox(
                            width: 10.0,
                          ),
                          Expanded(
                            child: Container(
                              child: Row(
                                children: [
                                  Expanded(
                                    child: InkWell(
                                      onTap: () {
                                        setState(() {
                                          initialYear--;
                                        });
                                        initialYear <= 1
                                            ? initialYear = 1
                                            : initialYear = initialYear;
                                      },
                                      child: Container(
                                        width:
                                            MediaQuery.of(context).size.width,
                                        height: 60,
                                        decoration: BoxDecoration(
                                          color: Colors.white,
                                          borderRadius:
                                              BorderRadius.circular(10),
                                          boxShadow: [
                                            BoxShadow(
                                              color: Color(0x19000000),
                                              blurRadius: 8,
                                              offset: Offset(2, 6),
                                            ),
                                          ],
                                        ),
                                        child: Center(
                                          child: Text('-1'),
                                        ),
                                      ),
                                    ),
                                  ),
                                  const SizedBox(
                                    width: 10.0,
                                  ),
                                  Expanded(
                                    child: InkWell(
                                      onTap: () {
                                        setState(() {
                                          initialYear++;
                                        });
                                      },
                                      child: Container(
                                        width:
                                            MediaQuery.of(context).size.width,
                                        height: 60,
                                        decoration: BoxDecoration(
                                          color: Colors.white,
                                          borderRadius:
                                              BorderRadius.circular(10),
                                          boxShadow: [
                                            BoxShadow(
                                              color: Color(0x19000000),
                                              blurRadius: 8,
                                              offset: Offset(2, 6),
                                            ),
                                          ],
                                        ),
                                        child: Center(
                                          child: Text('+1'),
                                        ),
                                      ),
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ),
                        ],
                      ),
                      const SizedBox(
                        height: 20.0,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.end,
                        children: [
                          Container(
                            width: 90,
                            height: 40,
                            child: ElevatedButton(
                                onPressed: () =>
                                    provider.addPekerjaan(widget.id),
                                child: Center(
                                    child: Text(
                                  "Tambah",
                                  style: TextStyle(color: Colors.white),
                                ))),
                          ),
                        ],
                      ),
                    ],
                  ),
                ));
          }),
        ),
        bottomNavigationBar:
            Consumer<addDataProvider>(builder: (context, value, child) {
          return Padding(
            padding: EdgeInsets.all(20),
            child: Container(
              width: MediaQuery.of(context).size.width,
              height: 50,
              child: ElevatedButton(
                  onPressed: () {
                    value.change == true
                        ? value.addDataPekerja()
                        : value.editDataPekerja(widget.id!);
                    Navigator.push(context,
                        MaterialPageRoute(builder: (context) => HomeView()));
                  },
                  child: Center(
                      child: Text(
                    "Simpan",
                    style: TextStyle(color: Colors.white),
                  ))),
            ),
          );
        }),
        body: Consumer<addDataProvider>(builder: (context, value, child) {
          return Padding(
            padding: EdgeInsets.symmetric(horizontal: 12.0),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                const SizedBox(
                  height: 10.0,
                ),
                Expanded(
                  child: ListView.builder(
                    itemCount: value.listPekerjaan.length,
                    physics: const ScrollPhysics(),
                    itemBuilder: (BuildContext context, int index) {
                      return Padding(
                        padding: const EdgeInsets.symmetric(vertical: 5.0),
                        child: Container(
                          width: MediaQuery.of(context).size.width,
                          height: 50,
                          decoration: BoxDecoration(
                            color: Colors.white,
                            borderRadius: BorderRadius.circular(10),
                            boxShadow: [
                              BoxShadow(
                                color: Color(0x19000000),
                                blurRadius: 2,
                                offset: Offset(-2, 6),
                              ),
                            ],
                          ),
                          child: Padding(
                            padding:
                                const EdgeInsets.symmetric(horizontal: 20.0),
                            child: Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Row(
                                  mainAxisAlignment: MainAxisAlignment.start,
                                  children: [
                                    Text(
                                      value.listPekerjaan[index].pekerjaan! +
                                              ' ' +
                                              value.listPekerjaan[index]
                                                  .waktu! ??
                                          '${value.listPekerjaan[index].toString()}',
                                      style: TextStyle(
                                          fontSize: 12.0, color: Colors.black),
                                    ),
                                    const SizedBox(
                                      width: 20.0,
                                    ),
                                  ],
                                ),
                                InkWell(
                                  onTap: () => value.delete(index, widget.id),
                                  child: Icon(
                                    Icons.close,
                                    color: Colors.red,
                                  ),
                                )
                              ],
                            ),
                          ),
                        ),
                      );
                    },
                  ),
                ),
              ],
            ),
          );
        }));
  }

  int initialYear = 1;
}
