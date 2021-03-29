#include <iostream>
#include <vector>
using namespace std;

int main()
{
    vector <vector<int> > a(2,vector<int>(2,0));
    vector <vector<int> > b(2,vector<int>(2,0));
    vector <vector<int> > ans(2, vector<int>(2,0));

    int m = 1;
    for(int i = 0; i < 2; i++){
        vector <int> v;
        for(int j = 0; j < 2; j++){
            a[i][j] = m;    
            b[i][j] = m;    
            m++;
        }
    }

    for(int i = 0; i < 2; i++){
        vector <int> v;
        for(int j = 0; j < 2; j++){
            a[i][j] = m;    
            m++;
        }
    }

    for(int f = 0; f < 2; f++){
        for(int i = 0; i < 2; i++){
            ans[f][i] = 0;
            for(int j = 0; j < 2; j++){
                ans[f][i] += (a[f][j] * b[j][i]);
            }
            cout << endl;
        }
    }
                                                                                                                            
}