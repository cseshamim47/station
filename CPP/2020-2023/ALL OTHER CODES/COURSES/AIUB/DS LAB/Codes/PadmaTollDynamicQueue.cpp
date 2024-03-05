#include <iostream>
using namespace std;

struct toll
{
    string date;
    string carNumber;
    string ticketNumber;
    int tollRate;
};
        
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
            int cnt = 1;
            if(!empty()){
                for(int i = frontIdx; i <= backIdx; i++){
                    if(Queue[i].date == date){
                        if(cnt){
                            if(Queue[i].tollRate == 800){
                            cout << "## Total Vehicle on heavyDuty : " << tollCount << endl;
                                cnt = 0;
                            }else if(Queue[i].tollRate == 500){
                            cout << "## Total Vehicle on mediumDuty : " << tollCount << endl;
                            cnt = 0;
                            }else if(Queue[i].tollRate == 300){
                            cout << "## Total Vehicle on lightDuty : " << tollCount << endl;
                            cnt = 0;
                            }
                        }
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

// pass by reference : the elements does not get copied instead it's referred
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
        if(tolltollype == 800){
            cout << "\n## Total Earning of Heavy-Duty  ##\n";
            cout << "Date : " << date << endl;
            cout << "------> " << totalEarning << " taka" << endl;
        }else if(tolltollype == 500){
            cout << "\n## Total Earning of Medium-Duty  ##\n";
            cout << "Date : " << date << endl;
            cout << "------> " << totalEarning << " taka" << endl;
        }else if(tolltollype == 300){
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
    toll padma;
    queue heavyDuty,mediumDuty,lightDuty;
    padma.date = "26-Jun-21";
    padma.carNumber = "Dhaka-00";
    padma.ticketNumber = "00";
    padma.tollRate = 800;
    heavyDuty.enqueue(padma);
    
    padma.date = "26-Jun-21";
    padma.carNumber = "Kushtia-01";
    padma.ticketNumber = "01";
    padma.tollRate = 800;
    heavyDuty.enqueue(padma);
    
    padma.date = "26-Jun-21";
    padma.carNumber = "Ctg-02";
    padma.ticketNumber = "02";
    padma.tollRate = 800;
    heavyDuty.enqueue(padma);

    padma.date = "25-Jun-21";
    padma.carNumber = "Dhaka-00";
    padma.ticketNumber = "00";
    padma.tollRate = 500;
    mediumDuty.enqueue(padma);
    
    padma.date = "25-Jun-21";
    padma.carNumber = "Kushtia-01";
    padma.ticketNumber = "01";
    padma.tollRate = 500;
    mediumDuty.enqueue(padma);
    
    padma.date = "25-Jun-21";
    padma.carNumber = "Ctg-02";
    padma.ticketNumber = "02";
    padma.tollRate = 500;
    mediumDuty.enqueue(padma);
    

    heavyDuty.showIndividualTicket("Ctg-02");

    totalEarningAll(heavyDuty,mediumDuty,lightDuty,"25-Jun-21");
    totalEarningSingle(heavyDuty,"26-Jun-21");

    heavyDuty.dequeue();
    heavyDuty.dequeue();
    // heavyDuty.dequeue();
    vehicleQueue(heavyDuty,"26-Jun-21");
    vehicleQueue(mediumDuty,"25-Jun-21");

}