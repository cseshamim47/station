using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using myNewProject;

namespace myNewProject.SubFolder
{
    public class temp
    {
        // 1. reference -> ref

        public static void Swap(ref int x,ref int y)
        {
            int tmp = x;
            x = y;
            y = tmp;

            Console.WriteLine("Function -> x: {0}, y:{1}", x, y);
        }

        public static void M1(out int x)
        {
            x = 1000000;
            x = x + 1123;
        }


        public static void M2(int a, int b, int c)
        {
            Console.WriteLine(a + " " + b + " " + c);
        }

    }
}
