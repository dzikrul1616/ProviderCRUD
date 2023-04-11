import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter/src/widgets/placeholder.dart';
import 'package:formstate/Screen/Barscreen/biodata.dart';
import 'package:formstate/Screen/Barscreen/pekerjaan.dart';
import 'package:formstate/Screen/Barscreen/pendidikan.dart';
import 'package:formstate/Screen/home.dart';
import 'package:formstate/model/form.dart';
import 'package:formstate/provider/adddata.dart';
import 'package:provider/provider.dart';

class FormDataView extends StatefulWidget {
  const FormDataView({super.key});

  @override
  State<FormDataView> createState() => _FormDataViewState();
}

class _FormDataViewState extends State<FormDataView> {
  int currentIndex = 0;
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
        create: (BuildContext context) => addDataProvider(),
        child: Consumer<addDataProvider>(builder: (context, value, child) {
          return DefaultTabController(
            length: 3,
            child: Scaffold(
              appBar: AppBar(
                title: const Text('Form Data'),
              ),
              body: Column(
                children: [
                  Row(
                    children: [
                      Expanded(
                        child: TabBar(
                          onTap: (value) => setState(() {
                            currentIndex = value;
                          }),
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
                    child: IndexedStack(
                      index: currentIndex,
                      children: [
                        BiodataView(),
                        PendidikanView(),
                        PekerjaanView(),
                      ],
                    ),
                  ),
                ],
              ),
            ),
          );
        }));
  }

  @override
  void initState() {
    super.initState();
  }

  void addPekerjaan(DocumentReference docRef) async {
    namapekerjaanController.clear();
    CollectionReference jenisCollection = docRef.collection('pekerjaan');

    await jenisCollection.add({
      'nama_pekerjaan': namapekerjaanController.text,
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

    addPekerjaan(pasarDocRef); // Memanggil fungsi addPekerjaan
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
    namapekerjaanController.dispose();
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
