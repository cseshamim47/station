using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppFMPro
{
    internal class Calculator
    {
        internal void Addition(int x, int y)
        { 
        }

        internal void Addition(int x, int y, int z)
        {
        }

        internal void Addition(int x, string y)
        {
        }

        internal void Addition( int y)
        {
        }

        internal int Addition(int[] info)
        {
            int sum = 0;
            byte count = 0;
            while (count < info.Length)
            {
                sum += info[count];
                count++;
            }
            Console.WriteLine("{0}", sum);
            return sum;
        }
    }
}
