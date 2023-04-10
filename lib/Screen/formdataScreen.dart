import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter/src/widgets/placeholder.dart';
import 'package:formstate/Screen/Barscreen/biodata.dart';
import 'package:formstate/Screen/Barscreen/pekerjaan.dart';
import 'package:formstate/Screen/Barscreen/pendidikan.dart';
import 'package:formstate/Screen/home.dart';
import 'package:formstate/model/form.dart';

class FormDataView extends StatefulWidget {
  const FormDataView({super.key});

  @override
  State<FormDataView> createState() => _FormDataViewState();
}

class _FormDataViewState extends State<FormDataView> {
  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 3,
      child: Scaffold(
        bottomNavigationBar: Padding(
          padding: EdgeInsets.all(20),
          child: Container(
            width: MediaQuery.of(context).size.width,
            height: 50,
            child: ElevatedButton(
                onPressed: addDataToFirebase,
                child: Center(
                    child: Text(
                  "Simpan",
                  style: TextStyle(color: Colors.white),
                ))),
          ),
        ),
        appBar: AppBar(
          title: const Text('Form Data'),
        ),
        body: Column(
          children: [
            Row(
              children: [
                Expanded(
                  child: TabBar(
                    labelColor: Colors.grey[800],
                    tabs: [
                      Tab(
                        text: "Biodata",
                      ),
                      Tab(
                        text: "Pendidikan",
                      ),
                      Tab(
                        text: "Pekerjaan",
                      ),
                    ],
                  ),
                ),
              ],
            ),
            Expanded(
              child: TabBarView(
                children: [
                  Container(
                    child: Padding(
                      padding: const EdgeInsets.all(12.0),
                      child: ListView(
                        children: [
                          Padding(
                            padding:
                                const EdgeInsets.symmetric(horizontal: 15.0),
                            child: Container(
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
                                  padding:
                                      EdgeInsets.symmetric(horizontal: 15.0),
                                  child: Column(
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
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
                                        mainAxisAlignment:
                                            MainAxisAlignment.spaceBetween,
                                        children: [
                                          Expanded(
                                            child: TextFormField(
                                              controller:
                                                  namapekerjaanController,
                                              decoration: InputDecoration(
                                                  filled: true,
                                                  fillColor: Colors.grey[200],
                                                  border: OutlineInputBorder(
                                                      borderRadius:
                                                          BorderRadius.circular(
                                                              10),
                                                      borderSide:
                                                          BorderSide.none)),
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
                                        mainAxisAlignment:
                                            MainAxisAlignment.end,
                                        children: [
                                          Expanded(
                                            child: Container(
                                              width: MediaQuery.of(context)
                                                  .size
                                                  .width,
                                              height: 60,
                                              decoration: BoxDecoration(
                                                color: Colors.grey[200],
                                                borderRadius:
                                                    BorderRadius.circular(10),
                                              ),
                                              child: Center(
                                                child: Text('1'),
                                              ),
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
                                                    child: Container(
                                                      width:
                                                          MediaQuery.of(context)
                                                              .size
                                                              .width,
                                                      height: 60,
                                                      decoration: BoxDecoration(
                                                        color: Colors.white,
                                                        borderRadius:
                                                            BorderRadius
                                                                .circular(10),
                                                        boxShadow: [
                                                          BoxShadow(
                                                            color: Color(
                                                                0x19000000),
                                                            blurRadius: 8,
                                                            offset:
                                                                Offset(2, 6),
                                                          ),
                                                        ],
                                                      ),
                                                      child: Center(
                                                        child: Text('-1'),
                                                      ),
                                                    ),
                                                  ),
                                                  const SizedBox(
                                                    width: 10.0,
                                                  ),
                                                  Expanded(
                                                    child: Container(
                                                      width:
                                                          MediaQuery.of(context)
                                                              .size
                                                              .width,
                                                      height: 60,
                                                      decoration: BoxDecoration(
                                                        color: Colors.white,
                                                        borderRadius:
                                                            BorderRadius
                                                                .circular(10),
                                                        boxShadow: [
                                                          BoxShadow(
                                                            color: Color(
                                                                0x19000000),
                                                            blurRadius: 8,
                                                            offset:
                                                                Offset(2, 6),
                                                          ),
                                                        ],
                                                      ),
                                                      child: Center(
                                                        child: Text('+1'),
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
                                        mainAxisAlignment:
                                            MainAxisAlignment.end,
                                        children: [
                                          Container(
                                            width: 90,
                                            height: 40,
                                            child: ElevatedButton(
                                                onPressed: addPekerjaan,
                                                child: Center(
                                                    child: Text(
                                                  "Tambah",
                                                  style: TextStyle(
                                                      color: Colors.white),
                                                ))),
                                          ),
                                        ],
                                      ),
                                    ],
                                  ),
                                )),
                          ),
                          const SizedBox(
                            height: 10.0,
                          ),
                          Text(
                            "Nama",
                            style: const TextStyle(
                              fontSize: 14.0,
                              fontWeight: FontWeight.w400,
                            ),
                          ),
                          const SizedBox(
                            height: 5.0,
                          ),
                          TextFormField(
                            controller: namaController,
                            decoration: InputDecoration(
                                filled: true,
                                fillColor: Colors.grey[200],
                                border: OutlineInputBorder(
                                    borderRadius: BorderRadius.circular(10),
                                    borderSide: BorderSide.none)),
                          ),
                          const SizedBox(
                            height: 10.0,
                          ),
                          Text(
                            "No Hp",
                            style: const TextStyle(
                              fontSize: 14.0,
                              fontWeight: FontWeight.w400,
                            ),
                          ),
                          const SizedBox(
                            height: 5.0,
                          ),
                          TextFormField(
                            controller: nohpController,
                            decoration: InputDecoration(
                                filled: true,
                                fillColor: Colors.grey[200],
                                border: OutlineInputBorder(
                                    borderRadius: BorderRadius.circular(10),
                                    borderSide: BorderSide.none)),
                          ),
                          const SizedBox(
                            height: 10.0,
                          ),
                          Text(
                            "Alamat",
                            style: const TextStyle(
                              fontSize: 14.0,
                              fontWeight: FontWeight.w400,
                            ),
                          ),
                          const SizedBox(
                            height: 5.0,
                          ),
                          TextFormField(
                            controller: alamatController,
                            decoration: InputDecoration(
                                filled: true,
                                fillColor: Colors.grey[200],
                                border: OutlineInputBorder(
                                    borderRadius: BorderRadius.circular(10),
                                    borderSide: BorderSide.none)),
                          ),
                          const SizedBox(
                            height: 10.0,
                          ),
                          Text(
                            "Pendidikan Terakhir",
                            style: const TextStyle(
                              fontSize: 14.0,
                              fontWeight: FontWeight.w400,
                            ),
                          ),
                          const SizedBox(
                            height: 5.0,
                          ),
                          Container(
                            decoration: BoxDecoration(
                                color: Colors.grey[200],
                                borderRadius: BorderRadius.circular(10)),
                            child: Padding(
                              padding:
                                  const EdgeInsets.symmetric(horizontal: 10),
                              child: DropdownButton<String>(
                                value: selectedPendidikan,
                                onChanged: (String? value) {
                                  setState(() {
                                    selectedPendidikan = value;
                                  });
                                },
                                focusColor: Colors.grey,
                                icon: Icon(Icons.keyboard_arrow_down_rounded),
                                iconSize: 20,
                                style: TextStyle(
                                    color: Color(0xff828282),
                                    fontSize: 14,
                                    fontWeight: FontWeight.w400),
                                underline: Container(),
                                isExpanded: true,
                                items: pendidikanList
                                    .map((pendidikan) =>
                                        DropdownMenuItem<String>(
                                          value: pendidikan,
                                          child: Text(pendidikan),
                                        ))
                                    .toList(),
                              ),
                            ),
                          ),
                          const SizedBox(
                            height: 10.0,
                          ),
                        ],
                      ),
                    ),
                  ),
                  PendidikanView(),
                  PekerjaanView(),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  @override
  void initState() {
    super.initState();
  }

  void addPekerjaan() async {
   
    CollectionReference pasarCollection =
        FirebaseFirestore.instance.collection('orang');
    DocumentReference pasarDocRef = await pasarCollection.doc();
    await pasarDocRef.set({
      'nama': namaController.text,
      'no_hp': nohpController.text,
      'alamat': alamatController.text,
      'pendidikan_terakhir': selectedPendidikan,
    });
    CollectionReference jenisCollection = pasarDocRef.collection('pekerjaan');

    await jenisCollection.add({
      'nama_pekerjaan': namapekerjaanController.text,
      'tahun': '2002',
    });
  }

  void addDataToFirebase() async {
     Navigator.push(
        context, MaterialPageRoute(builder: (context) => HomeView()));
    CollectionReference pasarCollection =
        FirebaseFirestore.instance.collection('orang');

    DocumentReference pasarDocRef = await pasarCollection.add({
      'nama': namaController.text,
      'no_hp': nohpController.text,
      'alamat': alamatController.text,
      'pendidikan_terakhir': selectedPendidikan,
    });

    CollectionReference jenisCollection = pasarDocRef.collection('pekerjaan');

    await jenisCollection.add({
      'nama_pekerjaan': namapekerjaanController.text,
      'tahun': '2002',
    });
  }

  final _FormDataList = <FormData>[];
  final namaController = TextEditingController();
  final nohpController = TextEditingController();
  final alamatController = TextEditingController();
  final namapekerjaanController = TextEditingController();
  String? selectedPendidikan;

  @override
  void dispose() {
    namaController.dispose();
    nohpController.dispose();
    alamatController.dispose();
    alamatController.dispose();
    super.dispose();
  }

  final List<String> pendidikanList = [
    'smp',
    'sma',
    'smk',
    'd1',
    'd2',
    'd3',
    'd4',
    's1',
    's2',
    's3',
  ];
}
