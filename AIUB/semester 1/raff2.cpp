#include <iostream>
using namespace std;
int main()
{
    int arr[100];
    int j = 0;
    int k = 0;
    int arrSize;
    cout << "Input array size : ";
    cin >> arrSize;
    cout << "\nInput index values" << endl;
    for(int i = 0; i<arrSize; i++){
        cout << "Index [" << i << "] : ";
        cin >> arr[i];
    }

    for(int i=0; i<arrSize; i++){
        for(j=i+1; j<arrSize; j++){
            if(arr[j]==arr[i]){
                for(k=j; k<arrSize; k++){
                    arr[k]=arr[k+1];
                }
                arrSize--;
                j--;
            }
        }
    }
    cout << "\nArray values : ";
    for(int i=0; i<arrSize; i++){
        cout << arr[i] << "  ";
    }

}
