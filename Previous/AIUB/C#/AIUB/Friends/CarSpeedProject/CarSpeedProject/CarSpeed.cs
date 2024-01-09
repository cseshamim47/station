using System;
using System.Collections.Generic;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CarSpeedProject
{
    internal class CarSpeed
    {
        float acceleration;
        string engine_number;
        bool start;
        float time;
        float velocity;

        internal CarSpeed(float acceleration = 0, string engine_number = "", bool start = false)
        {
            this.acceleration = acceleration;
            this.engine_number = engine_number;
            this.start = start;

        }

        internal void StartCar()
        {
            this.start = true;
            Console.WriteLine("Car started successfully");
        }
        internal void StopCar()
        {
            this.start = false;
            Console.WriteLine("Car stopped successfully");
        }

        internal void SetAcceleration(float acceleration)
        {
            this.acceleration = acceleration;
        }
        internal void SetEngineNumber(string engine_number)
        {
            this.engine_number = engine_number;
        }
        internal void SetTime()
        {
            Console.Write("Enter the time: ");
            this.time = float.Parse(Console.ReadLine(), CultureInfo.InvariantCulture.NumberFormat);
        }
        internal float GetVelocity()
        {
            return this.acceleration*this.time;
        }

        internal void Print()
        {
            this.velocity = this.GetVelocity();
            Console.WriteLine("Engine number of a car set to " + this.engine_number);
            Console.WriteLine("Car's acceleration is " + this.acceleration.ToString("0.00"));
            this.StartCar();
            Console.WriteLine("Velocity of the car after " + this.time.ToString("0.00") + " seconds is " + this.velocity.ToString("0.00"));
            this.StopCar();
        }

    }
}
