using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MyPersonal
{
    internal class test
    {
        private string name;

        public string Name
        {
            get { return this.name; }
            set { this.name = value; }
        }

        public test(int x)
        {
            Console.WriteLine("{0}",x);
        }
    }
}
