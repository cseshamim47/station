import FileHandling.FileOperation;
import InterfaceAndAssociation.Library;
import SetGet.Book;
import SetGet.Librarian;
import SetGet.Student;
import SetGet.Teacher;

import java.util.Scanner;


public class Start {

    public static void main(String[] args) {

        Scanner s = new Scanner(System.in);
        Library l = new Library();
        FileOperation fo = new FileOperation();

        System.out.println("******* Library Management System ******");
        int choice;
        int op1;

        boolean a = true;

        while (a) {
            System.out.println("Choose Any optoin ->");
            System.out.println("   1. User Managementw");
            System.out.println("   2. Book Management");
            System.out.println("   3. Exit");

            System.out.print("Enter your choice : ");
            choice = s.nextInt();

            switch (choice) {
                case 1:
                    System.out.println("Inside User Management ->");
                    System.out.println("Choose any option form User Managemen ->");
                    System.out.println("  1. Insert User");
                    System.out.println("  2. Remove User");
                    System.out.println("  3. Show All User");
                    System.out.println("  4. Exit");

                    System.out.print("Enter your choice : ");
                    op1 = s.nextInt();

                    switch (op1) {
                        case 1:

                            int type;
                            System.out.println("Insert User Management ->");
                            System.out.println("1. Student");
                            System.out.println("2. Teacher");
                            System.out.println("3. Librarian");
                            System.out.println("4. Exit");
                            System.out.println("Choose User Type ->");
                            type = s.nextInt();

                            switch (type) {
                                case 1:
                                    Student s1 = new Student();
                                    String name;
                                    int age;
                                    int sid;
                                    double CGPA;
                                    System.out.println("Student User ->");
                                    System.out.print("Enter Student Name : ");
                                    name = s.next();
                                    System.out.print("Enter Student Age : ");
                                    age = s.nextInt();
                                    System.out.print("Enter Student Id : ");
                                    sid = s.nextInt();
                                    System.out.print("Enter Student CGPA : ");
                                    CGPA = s.nextDouble();
                                    s1.setName(name);
                                    s1.setAge(age);
                                    s1.setSid(sid);
                                    s1.setCGPA(CGPA);
                                    l.insertStudent(s1);
                                    break;

                                case 2:
                                    Teacher t1 = new Teacher();
                                    String name1;
                                    int age1;
                                    int tid;
                                    String designation;
                                    System.out.println("Teacher User ->");
                                    System.out.print("Enter Teacher Name : ");
                                    name1 = s.next();
                                    System.out.print("Enter Teacher Age : ");
                                    age1 = s.nextInt();
                                    System.out.print("Enter Teacher Id : ");
                                    tid = s.nextInt();
                                    System.out.print("Enter Teacher Designation : ");
                                    designation = s.next();
                                    t1.setName(name1);
                                    t1.setAge(age1);
                                    t1.setTid(tid);
                                    t1.setDesignation(designation);
                                    l.insertTeacher(t1);
                                    break;

                                case 3:
                                    Librarian l1 = new Librarian();
                                    String name2;
                                    int age2;
                                    int lid;
                                    System.out.println("Librarian User ->");
                                    System.out.print("Enter Librarian Name : ");
                                    name2 = s.next();
                                    System.out.print("Enter Librarian Age : ");
                                    age2 = s.nextInt();
                                    System.out.print("Enter Librarian Id : ");
                                    lid = s.nextInt();
                                    l1.setName(name2);
                                    l1.setAge(age2);
                                    l1.setLid(lid);
                                    l.insertLibrarian(l1);
                                    break;

                            }

                            break;

                        case 2:
                            
                            int type2;
                            System.out.println("Remove User ->");
                            System.out.println("1. Student");
                            System.out.println("2. Teacher");
                            System.out.println("3. Librarian");
                            System.out.println("Choose User Type ->");
                            type2 = s.nextInt();

                            switch (type2) {

                                case 1:
                                    System.out.print("Enter Student ID : ");
                                    int sid = s.nextInt();
                                    l.removeStudent(sid);
                                    break;

                                case 2:
                                    System.out.print("Enter Teacher ID : ");
                                    int tid = s.nextInt();
                                    l.removeTeacher(tid);
                                    break;

                                case 3:
                                    System.out.print("Enter Librarian ID : ");
                                    int lid = s.nextInt();
                                    l.removeLibrarian(lid);
                                    break;
                            }

                        //break;
                        case 3:

                            System.out.println("Show All User ->");
                            l.showAllStudent();
                            l.showAllTeacher();
                            l.showAllLibrarian();
                            break;

                    }
                    break;
                    
                    
                case 2:
                    System.out.println("Inside Book Management ->");
                    System.out.println("Choose any option form User Managemen ->");
                    System.out.println("  1. Insert Book");
                    System.out.println("  2. Remove Book");
                    System.out.println("  3. Show All Books");
                    System.out.println("  4. Exit");

                    System.out.print("Enter your choice : ");
                    op1 = s.nextInt();
                    
                    switch(op1){
                        case 1:
                            System.out.println("Insert Book ->");
                            Book b = new Book();                          
                            String bName;
                            int bId;
                            String bAuthor;
                            
                            System.out.print("Enter Book Name : ");
                            bName = s.next();
                            System.out.print("Ener Book Id : ");
                            bId = s.nextInt();
                            System.out.print("Enter Book Author : ");
                            bAuthor = s.next();
                            
                            b.setbName(bName);
                            b.setbId(bId);
                            b.setbAuthor(bAuthor);
                            
                            l.insertBook(b);
                            
                            fo.write(bName);
                            break;
                            
                        case 2:
                            System.out.println("Remove Book ->");
                            int bid;
                            System.out.print("Enter Book ID : ");
                            bid = s.nextInt();
                            l.removeBook(bid);
                            break;
                            
                        case 3:
                            System.out.println("Show All Books ->");
                            l.showAllBook();
                            break;
                            
                                                              
                    }
                    break;
                    
                case 3:
                    a = false;
                    break;
                
            }
                                                                             
        }

    }
}
