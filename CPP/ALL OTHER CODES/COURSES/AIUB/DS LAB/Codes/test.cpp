#include <iostream>
using namespace std;

struct toll
{
    string date;
    string carNumber;
    string ticketNumber;
    int tollRate;
};
// frontIdx = front
// backIdx = rear
// maxSize = QueueSize = 32
// tollCount : 1,2,3,4,5,6,7,8,9-16,17                 
class queue{
    int maxSize=4, frontIdx, backIdx,tollCount;
    toll *Queue; // int *ptr;
    public:
        queue(){
            Queue = new toll[maxSize]; // Queue : 4
            frontIdx = backIdx = -1;
            tollCount = 0;
        }
        ~queue(){ delete[] Queue; }
        bool empty(){
            if((frontIdx == -1) and (backIdx == -1)){
                return true;
            }else return false;
        }
        bool full(){
            if(backIdx == (maxSize-1)){
               return true;
            }return false;
        }
        // maxSize = QueueSize = 4
        // tollCount : 0
        // car : 0   
        toll front(){ 
            if(empty()){
                cout << "Queue empty!\n";
                abort();
            }
            return Queue[frontIdx]; 
        }
        // toll back(){
        //     if(empty()){
        //         cout << "Queue empty!\n";
        //         abort();
        //     }
        //     return Queue[backIdx]; 
        // }
        void enqueue(toll data){ 
            if(full()){
                maxSize *= 2;
                toll *tempQ = new toll[maxSize];
                for(int i = 0; i < tollCount; i++)
                    tempQ[i] = Queue[i];
                delete[] Queue;
                Queue = tempQ;
            }
            if(empty()){
                frontIdx = backIdx = 0;
                Queue[backIdx] = data;
                tollCount++;
            }else{
                backIdx = (backIdx+1) % maxSize;
                Queue[backIdx] = data;
                tollCount++;
            }
        }
        void dequeue(){
            if(empty()){
                cout << "Queue is empty! dequeue is not possible\n";
            }else if(backIdx == frontIdx){
                frontIdx = backIdx = -1;
                tollCount--;
            }else{
                frontIdx = (frontIdx+1)%maxSize;
                tollCount--;
            }
        }
        int size(){
            return tollCount;
        }
        int maxsize(){
            return maxSize;
        }
        void showIndividualTicket(string carNumber){
            if(!empty()){
                for(int i = frontIdx; i <= tollCount; i++){
                    if(Queue[i].carNumber == carNumber){
                        cout << "\n## Individual Ticket Info ##" << endl;
                        cout << "Date : " << Queue[i].date << endl;
                        cout << "Car Number : " << Queue[i].carNumber << endl;
                        cout << "Ticket Number : " << Queue[i].ticketNumber << endl;
                        // cout << Queue[i].front().tollRate << endl;
                    }
                }
            }
        }
        void showAllTicket(string date){
            cout << "\n## All Ticket Info ##" << endl;
            cout << "## Date : " << date << endl;
            cout << "## Total Vehicle on queue : " << tollCount << endl;
            if(!empty()){
                for(int i = frontIdx; i <= backIdx; i++){
                    if(Queue[i].date == date){
                        cout << "----------------- " << endl;
                        cout << "Car Number : " << Queue[i].carNumber << endl;
                        cout << "Ticket Number : " << Queue[i].ticketNumber << endl;
                    }
                }
            }
        }
        int totalEarningSingle(string date){
            int totalEarning = 0;
            int tolltollype = 0;
            if(!empty()){
                for(int i = frontIdx; i <= tollCount; i++){
                    if(Queue[i].date == date){
                        totalEarning += Queue[i].tollRate;
                        tolltollype = Queue[i].tollRate;
                    }
                }
            }
            return totalEarning;
        }
};

// pass by reference :: does not copy but refer
void totalEarningAll(queue &heavyDuty, queue &mediumDuty, queue &lightDuty,string date){
    int totalEarning = 0;
    if(!heavyDuty.empty())
        totalEarning += heavyDuty.totalEarningSingle(date);
    if(!mediumDuty.empty())
        totalEarning += mediumDuty.totalEarningSingle(date);
    if(!lightDuty.empty())
        totalEarning += lightDuty.totalEarningSingle(date);

    cout << "\n## Total Earning of " << date << " ##\n";
    cout << "------> " << totalEarning << endl;
}

void totalEarningSingle(queue &VehicleType, string date){
    int totalEarning = 0;
    if(!VehicleType.empty()){
        int tolltollype = VehicleType.front().tollRate;
        totalEarning = VehicleType.totalEarningSingle(date);
        if(tolltollype == 700){
            cout << "\n## Total Earning of Heavy-Duty  ##\n";
            cout << "Date : " << date << endl;
            cout << "------> " << totalEarning << " taka" << endl;
        }else if(tolltollype == 400){
            cout << "\n## Total Earning of Medium-Duty  ##\n";
            cout << "Date : " << date << endl;
            cout << "------> " << totalEarning << " taka" << endl;
        }else if(tolltollype == 200){
            cout << "\n## Total Earning of Light-Duty  ##\n";
            cout << "Date : " << date << endl;
            cout << "------> " << totalEarning << " taka" << endl;
        }
    }else {
            cout << "\n## Total Earning of Light-Duty  ##\n";
            cout << "------> " << totalEarning << " taka" << endl;
    }
}

void vehicleQueue(queue &VehicleType, string date){
    VehicleType.showAllTicket(date);
}
int main()
{
    toll padma; // int x;
    queue heavyDuty,mediumDuty,lightDuty;
    padma.date = "25-Jun-21";
    padma.carNumber = "Dhaka-00";
    padma.ticketNumber = "00";
    padma.tollRate = 700;
    heavyDuty.enqueue(padma);
    
    padma.date = "25-Jun-21";
    padma.carNumber = "Kushtia-01";
    padma.ticketNumber = "01";
    padma.tollRate = 700;
    heavyDuty.enqueue(padma);
    
    padma.date = "25-Jun-21";
    padma.carNumber = "Ctg-02";
    padma.ticketNumber = "02";
    padma.tollRate = 700;
    heavyDuty.enqueue(padma);

    padma.date = "25-Jun-21";
    padma.carNumber = "Dhaka-00";
    padma.ticketNumber = "00";
    padma.tollRate = 400;
    mediumDuty.enqueue(padma);
    
    padma.date = "26-Jun-21";
    padma.carNumber = "Kushtia-01";
    padma.ticketNumber = "01";
    padma.tollRate = 400;
    mediumDuty.enqueue(padma);
    
    padma.date = "25-Jun-21";
    padma.carNumber = "Ctg-02";
    padma.ticketNumber = "02";
    padma.tollRate = 400;
    mediumDuty.enqueue(padma);

    

    heavyDuty.showIndividualTicket("Ctg-02");

    totalEarningAll(heavyDuty,mediumDuty,lightDuty,"25-Jun-21");
    totalEarningSingle(mediumDuty,"25-Jun-21");

    // heavyDuty.dequeue();
    // heavyDuty.dequeue();
    // heavyDuty.dequeue();
    vehicleQueue(heavyDuty,"25-Jun-21");

}