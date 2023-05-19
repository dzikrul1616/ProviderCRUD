import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter/src/widgets/placeholder.dart';
import 'package:formstate/screen/Barscreen/biodata_page.dart';
import 'package:formstate/screen/Barscreen/pekerjaan_page.dart';
import 'package:formstate/screen/Barscreen/pendidikan_page.dart';
import 'package:formstate/screen/home_view.dart';
import 'package:formstate/provider/add_edit_data.dart';
import 'package:provider/provider.dart';

class FormDataView extends StatefulWidget {
  final String? id;
  FormDataView({required this.id});

  @override
  State<FormDataView> createState() => _FormDataViewState();
}

class _FormDataViewState extends State<FormDataView> {
  int currentIndex = 0;
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
        create: (BuildContext context) => AddDataProvider(widget.id),
        child: Consumer<AddDataProvider>(builder: (context, value, child) {
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
                        PekerjaanView(id: widget.id! ?? ""),
                      ],
                    ),
                  ),
                ],
              ),
            ),
          );
        }));
  }
}
