#include <iostream>
using namespace std;

void print(int **arr, int m,int n){
    for(int i = 0; i < m; i++){
        for(int j = 0; j < n; j++){
            cout << arr[i][j] << " ";
        }
        cout << endl;
    }
}

int main()
{
    int oarr[3][3] = {{1,2,3},
                      {4,5,6},
                      {7,8,9}};
    
    int m = 3, n = 3;

    int **arr;
    arr = new int *[m];

    for(int i = 0; i < m; i++){
        arr[i] = new int[n];
        for(int j = 0; j < n; j++){
            arr[i][j] = oarr[i][j];
        }
    }
    }

    print(arr,m,n);
}