import 'package:flutter/material.dart';
import 'package:formstate/Screen/form_data_Screen.dart';
import 'package:formstate/Screen/home.dart';
import 'package:firebase_core/firebase_core.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp();
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      home: HomeView(),
      debugShowCheckedModeBanner: false,
    );
  }
}
