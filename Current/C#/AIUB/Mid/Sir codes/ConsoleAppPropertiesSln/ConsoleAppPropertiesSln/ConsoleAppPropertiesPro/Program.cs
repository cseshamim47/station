using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace ConsoleAppPropertiesPro
{
    class Program
    {
        static void Main(string[] args)
        {
            //Student s0 = new Student(100, "Bruce", new Address(12, 10, 1222, "Dhaka"));

            Student[] students = new Student[3];
            students[0] = new Student(100, "Bruce", new Address(12, 10, 1222, "Dhaka"));
            students[1] = new Student(20, "Clerk", new Address(32, 50, 1202, "Sylhet"));

            //byte t = 0;
            //while (t < students.Length)
            //{
            students[2] = new Student();
            //    t++;
            //}
            students[2].SetId(30);
            students[2].SetName("Arthur");
            students[2].SetAddress(new Address(42, 76, 1200, "Khulna"));
            //students[2].ShowStudentInfo();
            //students[1].ShowStudentInfo();

            //students[2].Name = "ndjskn"; // property
            //string z = students[2].Name;
            //students[2].Id = 190;

            int m = 0;
            while (m < students.Length)
            {
                students[m].ShowStudentInfo();
                m++;
            }


        }
    }
}


















/*
//Student s0 = new Student(100, "Bruce", new Address(10, 20, 1212, "Dhaka"));
            Student[] students = new Student[3];
            students[0] = new Student(10, "Bruce", new Address(10, 20, 1212, "Dhaka"));
            students[1] = new Student(200, "Clerk", new Address(11, 230, 1210, "Sylhet"));
            /*byte t = 0;
            while (t < students.Length)
            {
                students[t] = new Student();
            }
            students[2] = new Student();
            students[2].SetId(12);//students[2].id = 12;
            students[2].SetName("Arthur");
            students[2].SetAddress(new Address(1, 202, 1292, "Khulna"));
            students[2].ShowStudentInfo();
            students[0].ShowStudentInfo();

            students[2].Id = 2000;
            int z = students[2].Id;
*/