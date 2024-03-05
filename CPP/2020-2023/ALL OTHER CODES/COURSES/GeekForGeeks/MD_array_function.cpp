#include <iostream>
#include <vector>

using namespace std;


void print(int mat[][2], int m){
    for(int i = 0; i < 3; i++){
        for(int j =  0; j < 2; j++){
            cout << mat[i][j] << " ";
        }
        cout << "\n";
    }
}



int main()
{
    int m = 3, n = 2;

    int mat[3][2] = {{10,20},
                     {30, 40},
                     {50, 60}};

    print(mat,m);
    
}