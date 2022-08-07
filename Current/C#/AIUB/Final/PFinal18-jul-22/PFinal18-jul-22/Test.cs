using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace PFinal18_jul_22
{
    internal class Test
    {
        private Test()
        {

        }
        int Addition(int x,int y)
        { return x + y; }

        public override string ToString()
        {
            return "Abdul Rabbi";
        }

        int x;
        static public void Print() // all members must also be static
        {
            
            //int a = x; // cannot use x here as x is not static
        }
    }
}
