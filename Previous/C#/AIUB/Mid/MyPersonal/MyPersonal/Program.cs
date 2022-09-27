using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MyPersonal
{
    internal class Program
    {

        static void Main(string[] args)
        {
            test obj = new test(10);

            obj.Name = "shamim";

            Console.WriteLine(obj.Name);
            
        }
    }
}
