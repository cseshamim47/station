using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _20_JUN_22_INHERITANCE
{

   
    internal class Program
    {
        static void Main(string[] args)
        {
           // Person p = new Person(100, "Md Shamim Ahmed", new DateFormat(2, 12, 2012));
            //p.ShowPersonInfo();
            Student s = new Student(100, "Md Shamim Ahmed", new DateFormat(2, 12, 2012),3.912);
            Employee e = new Employee(100, "Md Shamim Ahmed", new DateFormat(2, 12, 2012),10500);

        }
    }
}
