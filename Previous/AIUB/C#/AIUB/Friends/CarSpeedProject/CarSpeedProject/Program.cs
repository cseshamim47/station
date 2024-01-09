using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Globalization;

namespace CarSpeedProject
{
    internal class Program
    {
        static void Main(string[] args)
        {
            CarSpeed car1 = new CarSpeed();
            for(int i = 1; i <= 3; i++)
            {
                Console.WriteLine("Details for the car " + i.ToString());
                Console.Write("Enter the engine number: ");
                string EngineNumber = Console.ReadLine();
                Console.Write("Enter the acceleration number: ");
                float Acceleration = float.Parse(Console.ReadLine(), CultureInfo.InvariantCulture.NumberFormat);

                car1.SetAcceleration(Acceleration);
                car1.SetEngineNumber(EngineNumber);
                car1.SetTime();
                car1.Print();

                Console.WriteLine();
            }
        }
    }
}
