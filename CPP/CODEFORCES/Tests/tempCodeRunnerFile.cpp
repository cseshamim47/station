#include <iostream>

using namespace std;

class bubbleSort{
    int arr[5];
    public:
        void swap(int *a, int *b){
            int temp = *a;
            *a = *b;
            *b = temp;
        }
        void sort(int abc[]){
            int tmp = 0;
            for(int i=0; i<5; i++){
                for(int j=i+1; j<5; j++){
                    if(abc[j] < abc[i]){
                        // tmp = abc[j];
                        // abc[j] = abc[i];
                        // abc[i] =tmp;
                        swap(&abc[i],&abc[j]);
                    }
                }
            }
            for(int i = 0; i < 5; i++) arr[i] = abc[i];
        }

        void print(){
            for(int i=0; i<5; i++){
                cout<<arr[i]<<"  ";
            }
        }
};

int main()
{
    int abc[5];
    cout << "Enter 5 unsorted integers : " << endl;
    for(int i = 0; i < 5; i++) cin >> abc[i];

    for(int i=0; i<5; i++){
        cout<<abc[i]<<"  ";
    }
    cout<<endl;
    cout<< "------------" <<endl;

    bubbleSort obj;
    obj.sort(abc);
    obj.print();    

    return 0;
}