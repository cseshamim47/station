using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppContainer
{
    class Program
    {
        static void Main(string[] args)
        {
            //Person[] persons = new Person[4];//P-1, P-2-E, P-3-S
            //persons[0] = new Student("Bruce", "A+", new DateTime(2000, 11, 18), 3.11);
            //persons[1] = new Employee("Clerk", "O+", new DateTime(2001, 07, 29), 10000);
            //persons[2] = new Student("Diana", "AB+", new DateTime(2000, 03, 09), 3.22);
            //persons[3] = new Employee("Arthur", "O+", new DateTime(2002, 01, 9), 11000);

            //XYZCorporation q = new XYZCorporation();
            XYZCorporation.AddPerson(new Student("Bruce", "A+", new DateTime(2000, 11, 18), 3.11));
            XYZCorporation.AddPerson(new Employee("Clerk", "O+", new DateTime(2001, 07, 29), 10000));
            XYZCorporation.AddPerson(new Student("Diana", "AB+", new DateTime(2000, 03, 09), 3.22));
            XYZCorporation.AddPerson(new Employee("Arthur", "O+", new DateTime(2002, 01, 9), 11000));
            XYZCorporation.ShowAll();
            //XYZCorporation.Search("P-3-Sw");
            //XYZCorporation.DeletePerson("P-3-S");

            //foreach (var p in persons)
            //    p.ShowInfo();
            //Person p1;// = new Person();
            //Object o1 = 12;
            //Object o2 = 3.48;
            //Object o3 = "fhfhrug";
            //Object o4 = new Person("100", "Bruce", "A+", new DateTime(2000, 11, 18, 4, 14, 36));

            //Console.WriteLine(o1.GetType());
            //Console.WriteLine(o2.GetType());
            //Console.WriteLine(o3.GetType());
            //Console.WriteLine(o4.GetType());

            //var a = 12;
            //var b = 23.67;
            //var c = "yuyouer";
            //var d = new Person("100", "Bruce", "A+", new DateTime(2000, 11, 18, 4, 14, 36));
            //Console.WriteLine(a.GetType());
            //Console.WriteLine(b.GetType());
            //Console.WriteLine(c.GetType());
            //Console.WriteLine(d.GetType());

            //dynamic x = 98;
            //dynamic y = "retert";
            //dynamic z = new Person("100", "Bruce", "A+", new DateTime(2000, 11, 18, 4, 14, 36));
            //z.FakeMethod();
            //Console.WriteLine(x.GetType());
            //Console.WriteLine(y.GetType());


        }
    }
}
