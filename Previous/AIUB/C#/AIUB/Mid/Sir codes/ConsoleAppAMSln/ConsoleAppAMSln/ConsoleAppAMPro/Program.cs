using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppAMPro
{
    public enum WeekDay : byte
    {
        Sat = 200,
        Sun = 65,
        Mon
    }

    class Program
    {
        static void Main(string[] args)
        {
            Student s = new Student();
            SchoolStudent ss = new SchoolStudent();
            Console.WriteLine("{0}", (int)WeekDay.Sat);
        }
    }
}
