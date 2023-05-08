import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter/src/widgets/placeholder.dart';
import 'package:formstate/provider/add_edit_data.dart';
import 'package:provider/provider.dart';

class PendidikanView extends StatefulWidget {
  const PendidikanView({super.key});

  @override
  State<PendidikanView> createState() => _PendidikanViewState();
}

class _PendidikanViewState extends State<PendidikanView> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Consumer<addDataProvider>(builder: (context, value, child) {
      return Padding(
        padding: const EdgeInsets.all(12.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
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
                  padding: const EdgeInsets.symmetric(horizontal: 10),
                  child: DropdownButton<String>(
                    value: value.selectedPendidikan,
                    onChanged: value.valueList,
                    focusColor: Colors.grey,
                    icon: Icon(Icons.keyboard_arrow_down_rounded),
                    iconSize: 20,
                    style: TextStyle(
                        color: Color(0xff828282),
                        fontSize: 14,
                        fontWeight: FontWeight.w400),
                    underline: Container(),
                    isExpanded: true,
                    items: value.pendidikana.map((pendidikan) {
                      return DropdownMenuItem<String>(
                        value: pendidikan,
                        child: Text(pendidikan),
                      );
                    }).toList(),
                    
                  )),
            ),
          ],
        ),
      );
    }));
  }
}
