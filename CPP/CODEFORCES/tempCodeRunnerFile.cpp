#include <iostream>
using namespace std;

int main()
{
    int m, n , o;
    cin >> m >> n;
    int x[m][n];
    int y[m][n];
    int z[m][n];
    int sum[m][n];

    for(int i = 0; i < m; i++){
        for(int j = 0; j<n; j++){
            cin >> x[i][j];
        }
    }
    for(int i = 0; i < m; i++){
        for(int j = 0; j<n; j++){
            cin >> y[i][j];
        }
    }
    for(int i = 0; i < m; i++){
        for(int j = 0; j<n; j++){
            cin >> z[i][j];
        }
    }

    for(int i = 0; i < m; i++){
        for(int j = 0; j<n; j++){
            sum[i][j] = x[i][j] + y[i][j] + z[i][j];
        } 
    }

    cout << "Sum of the matrices : " << endl;
    for(int i = 0; i < m; i++){
        for(int j = 0; j<n; j++){
           cout <<  sum[i][j] << " ";
        } 
        cout << endl;
    }
    




}