// problem 4 : matrix addition
#include <iostream>
using namespace std;


int main()
{
    int arr1[3][3];
    for(int i = 0; i < 3; i++){
        for(int j = 0; j < 3; j++){
            cin >> arr1[i][j];
        }
    }

    int arr2[3][3];
    for(int i = 0; i < 3; i++)
        for(int j = 0; j < 3; j++)
            cin >> arr2[i][j];
    
    int arr3[3][3];
    for(int i = 0; i < 3; i++)
        for(int j = 0; j < 3; j++)
            cin >> arr3[i][j];
    
    int sum[3][3];

    cout << "\nOutput : \n";
    for(int i = 0; i < 3; i++){
       for(int j = 0; j < 3; j++){
          sum[i][j] = arr1[i][j] + arr2[i][j] + arr3[i][j];
          cout << sum[i][j] << " ";
       }
       cout << endl;
    }
}

// 12 13 14 
// 15 16 17 
// 18 19 20 

// 1 2 3 
// 4 5 6 
// 7 8 9 

// 101 104 107
// 102 105 108
// 103 106 109