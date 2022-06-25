using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppSingleInheritance
{
    class Program
    {
        static void Main(string[] args)
        {
            //Person[] personList = new Person[3];
            //personList[0] = new Person(1, "Bruce", new DateFormat(2, 12, 2010));
            //personList[1] = new Student(2, "Diana", new DateFormat(23, 2, 2010), 3.21);
            //personList[2] = new Employee(3, "Clerk", new DateFormat(23, 7, 2011), 10000);

            //foreach (Person p in personList)
            //    p.ShowInfo();

            //byte count = 0;
            //while (count < personList.Length)
            //{
            //    personList[count].ShowInfo();
            //    count++;
            //}
            //Student s = new Student(2, "Diana", new DateFormat(23, 2, 2010), 3.21);
            //Employee e = new Employee(3, "Clerk", new DateFormat(23, 7, 2011), 10000);

            //p1.ShowInfo();
            //p2.ShowInfo();
            //p3.ShowInfo();

            //Parent p = new Parent(7);
            //Child c = new Child();
            //Child c1 = new Child(5);

            //Parent p = new Parent(24);
            //Child c = new Child("OOP-2");

            Parent p = new Parent();
            Child c = new Child();
            Parent p1 = new Child();
            Console.WriteLine();
            p.MethodA();
            c.MethodA();

            //p.MethodB();
            //c.MethodB();
            //Console.WriteLine();
            //p1.MethodA();
            p1.MethodB();
            //p1.MethodC();
            //p1.me
            //Program pp = new Program();
            //pp.M();
            //M();
        }

        //private static void M()
        //{ 
        //}
    }
}
