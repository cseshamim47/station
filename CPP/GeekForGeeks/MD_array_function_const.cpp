#include <iostream>
#include <vector>

using namespace std;

const int R = 3;
const int C = 2;

void print(int mat[R][C]){
    for(int i = 0; i < R; i++){
        for(int j =  0; j < C; j++){
            cout << mat[i][j] << " ";
        }
        cout << "\n";
    }
}



int main()
{
    int mat[R][C] = {{10,20},
                     {30, 40},
                     {50, 60}};

    print(mat);
    
}